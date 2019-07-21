<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{

    public function index()
    {
        $title = 'About title 1';
        $description = 'About description 1';
//        return view('about',compact('title','description'));
        return view('about',[
            'aboutTitle' => $title,
            'aboutDescription' => $description
        ]);
    }
}
