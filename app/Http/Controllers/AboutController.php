<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function hello(){
        $names = ['mg mg', 'kyaw zin', 'thet naing'];
        //return response()->json(["name" => $name]);
        return view('about', [
            'names' => $names,
        ]);
    }
}
