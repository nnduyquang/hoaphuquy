<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CommonController extends Controller
{
    public function uploadImage(Request $request){
        dd($request);
        $file = $request->input('file');
        $directory = "images/temp/";
        $filename = $file->getClientOriginalName();
        $file->move($directory, $filename);
    }
    public function getDataFrontEnd(){
        return
    }
}
