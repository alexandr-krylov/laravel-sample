<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    public function get()
    {
        return json_encode(DB::table('articles')->where('id', 1)->first());
    }
}
