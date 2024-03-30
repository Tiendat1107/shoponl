<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Color;


class ColorController extends Controller
{
    public function add_color(){
        return view('admin.add_color');
    }
    public function save_color(Request $request){
        $color= Color::create($request ->all());
        dd($color);

    }
}
