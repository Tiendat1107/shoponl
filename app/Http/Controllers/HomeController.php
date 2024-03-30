<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
session_start();

class HomeController extends Controller
{
    public function index(){
        $cate_pro = DB::table('tbl_category_products')->where('category_status','1')->orderBy('category_id','desc')->get();
        $new_pro = DB::table('tbl_products')->where('product_status','1')->orderBy('product_id','desc')->limit(6)->get();
        return view('pages.home')->with('cate_pro',$cate_pro)->with('new_pro',$new_pro);
    }
}
