<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class NewController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $category = null, $hru = null)
    {
        if(is_null($category) && is_null($hru)) return view('news');
        elseif(View::exists($hru)) return view($hru);
        elseif(View::exists($category) && is_null($hru)) return view($category);
        abort(404);
    }
}
