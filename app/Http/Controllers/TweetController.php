<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TweetController extends Controller
{/**
     * 入力画面
     *
     * @return string
     */
    public function input()
    {
        return view('input');
    }

    // /**
    //  * 完了画面
    //  *
    //  * @return string
    //  */
    // public function save()
    // {
    //     return view('form.complete');
    // }
    // //
    //
}
