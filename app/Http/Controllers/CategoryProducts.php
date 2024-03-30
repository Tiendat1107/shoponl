<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use App\Models\Category;
use Illuminate\Support\Facades\Redirect;
session_start();

//Function Admin
class CategoryProducts extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('admin');   
        }else{
            return Redirect::to('login')->send();
        }
    }
    public function add_category_products(){
        $this->AuthLogin();
        return view('admin.add_category_products');
    }
    public function list_category_products(){
        $this->AuthLogin();
        $list_category_products = Category::all();
        $manager_category_products = view('admin.list_category_products')-> with('list_category_products',$list_category_products);
        return view('admin_home')->with('admin.list_category_products',$manager_category_products);
    }
    public function save_category_products(Request $request){
        Category::create($request ->all());
        Session::put('message','Thêm danh mục sản phẩm thành công.');
        return Redirect::to('add-category-products');
    }
    public function unactive_category_products($cate_id){
        Category::where('category_id', $cate_id)->update(['category_status' => 1]);
        Session::put('message', 'Hiện danh mục sản phẩm thành công.');
        return Redirect::to('list-category-products');
    }
    
    public function active_category_products($cate_id){
        Category::where('category_id', $cate_id)->update(['category_status' => 0]);
        Session::put('message', 'Ẩn danh mục sản phẩm thành công.');
        return Redirect::to('list-category-products');
    }
    
    public function edit_category_products($cate_id){
        $this->AuthLogin();
        $edit_category_products = Category::where('category_id', $cate_id)->get();
        $manager_category_products = view('admin.edit_category_products')-> with('edit_category_products',$edit_category_products);
        return view('admin_home')->with('admin.edit_category_products',$manager_category_products);
    }
    public function update_category_products(Request $request,$cate_id){
        $dataToUpdate = $request->only(['category_name', 'category_number',]);
        Category::where('category_id', $cate_id)->update($dataToUpdate);
        Session::put('message', 'Sửa danh mục sản phẩm thành công.');
        return Redirect::to('list-category-products');
    }
    public function remove_category_products($cate_id){
        Category::where('category_id', $cate_id)->delete();
        Session::put('message', 'Xóa danh mục sản phẩm thành công.');
        return Redirect::to('list-category-products');
    }

//Funtion Clients
    public function show_category_home($cate_id){
        $cate_pro = DB::table('tbl_category_products')->where('category_status','1')->orderBy('category_id','desc')->get();
        $cate_by_id = DB::table('tbl_products') -> join('tbl_category_products','tbl_category_products.category_id','=','tbl_products.category_id')->where('tbl_products.category_id', $cate_id) ->get();
        $cate_name = DB::table('tbl_category_products')->where('tbl_category_products.category_id', $cate_id)->limit(1)->get();
        return view('pages.category.show_category')->with('cate_pro',$cate_pro)->with('cate_by_id', $cate_by_id)->with('cate_name', $cate_name);
    }
}