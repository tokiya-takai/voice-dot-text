<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Lib\FileProcessing;

class HomeController extends Controller
{
    public function index(){
        return view('index');
    }

    public function download(Request $request){
        $textData = $request->text_data;

        $path = 'storage/files/';
        if( is_writable($path) ) {
            // 入力された内容でテキストファイルを作成
            $file_name = date('Y-m-d-H-i-s') . $this->random(12);
            file_put_contents( $path . $file_name . ".txt", $textData);

            // ファイルをダウンロード
            return Storage::download('public/files/' . $file_name . ".txt");
        }
    }

    private function random($length)
    {
        return substr(str_shuffle('1234567890abcdefghijklmnopqrstuvwxyz'), 0, $length);
    }
}
