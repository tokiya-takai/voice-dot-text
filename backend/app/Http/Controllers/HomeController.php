<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('index');
    }

    public function download(Request $request){
        $textData = $request->text_data;
        var_dump($textData);
    }
}
