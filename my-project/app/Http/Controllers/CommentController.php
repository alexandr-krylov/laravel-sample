<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CommentController extends Controller
{
    public function get()
    {
        return json_encode(
            DB::table('comments')
                ->leftJoin('users', 'comments.author_id', '=', 'users.id')
                ->where('article_id', 1)
                ->orderBy('comments.created_at')
                ->select('name as user_name', 'content', 'comments.created_at')
                ->get()
        );
    }
    public function post(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $content = $request->input('content');
        $commentId = null;
        DB::transaction(function() use ($name, $email, $content, &$commentId) {
            $result = DB::table('users')
                ->where('name', $name)
                ->where('email', $email)
                ->first();
            if (is_null($result)) {
                $authorId = DB::table('users')
                    ->insertGetId(['name' => $name, 'email' => $email, 'password' => Str::random(10)]);
            } else {
                $authorId = $result->id;
            }
            $commentId = DB::table('comments')
                ->insertGetId([
                    'article_id' => 1,
                    'author_id' => $authorId,
                    'content' => $content,
                    'created_at' => now()
                ]);
        });
        $comment = DB::table('comments')
            ->leftJoin('users', 'comments.author_id', '=', 'users.id')
            ->where('comments.id', $commentId)
            ->select('name as user_name', 'content', 'comments.created_at')
            ->first();
        return json_encode($comment);
    }
}
