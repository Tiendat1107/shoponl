<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use App\Models\Category;
use App\Models\Products;
use App\Models\Color;
use App\Models\Size;
use App\Models\Attribute;
use App\Models\ProductAttribute;
use Illuminate\Support\Facades\Redirect;


class ProductsController extends Controller
{
    //Function Admin
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('admin');   
        }else{
            return Redirect::to('login')->send();
        }
    }
    public function add_products(){
        $this->AuthLogin();
        $cate_pro = Category::orderBy('category_id','desc')->get();
        return view('admin.add_products', compact('cate_pro'));
    }
    
    public function list_products(){
        $this->AuthLogin();
        $list_products = Products::join('tbl_category_products','tbl_category_products.category_id','=','tbl_products.category_id')
            ->orderBy('tbl_products.product_id','desc')->get();
        foreach ($list_products as $product) {
            $product->totalQuantity = Attribute::where('id_product', $product->product_id)->sum('quantity');
        }
        return view('admin.list_products', compact('list_products'));
    }
    
    public function save_products(Request $request){
        $productData = [
            'product_name' => $request->product_name,
            'product_content' => $request->product_content,
            'product_price' => $request->product_price,
            'product_status' => $request->product_status,
            'category_id' => $request->product_cate
        ];
    
        $get_image = $request->file('product_image');
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads',$new_image);
            $productData['product_image'] = $new_image;
            
        }
        $product = Products::create($productData);
        $colors = $request->color;
        $sizes = $request->size;
        foreach ($colors as $color) {
            Color::create([
                'id_product' => $product->product_id,
                'color' => $color,
            ]);
        }
        foreach ($sizes as $size) {
            Size::create([
                'id_product' => $product->product_id,
                'size' => $size,
            ]);
        }
        foreach ($colors as $color) {
            foreach ($sizes as $size) {
                ProductAttribute::create([
                    'id_product' => $product->product_id,
                    'color' => $color,
                    'size' => $size,
                ]);
            }
        }
    
        Session::put('message', 'Thêm sản phẩm thành công.');
        return redirect()->to('add-products');
    }
    public function unactive_products($pro_id){
        DB::table('tbl_products')->where('product_id', $pro_id)->update(['product_status' => 1]);
        Session::put('message', 'Hiện danh mục sản phẩm thành công.');
        return Redirect::to('list-products');
    }
    
    public function active_products($pro_id){
        DB::table('tbl_products')->where('product_id', $pro_id)->update(['product_status' => 0]);
        Session::put('message', 'Ẩn danh mục sản phẩm thành công.');
        return Redirect::to('list-products');
    }
    
    public function edit_products($pro_id) {
        $this->AuthLogin();
        
        $edit_products = Products::where('product_id',$pro_id)->get();
        $cate_pro = Category::orderBy('category_id','desc')->get();
        $list_color = Color::join('tbl_products','tbl_products.product_id','=','tbl_color.id_product') ->where('tbl_products.product_id', $pro_id) -> orderBy('tbl_color.id_color','desc')->get();
        $list_size = Size::join('tbl_products','tbl_products.product_id','=','tbl_size.id_product') ->where('tbl_products.product_id', $pro_id) -> orderBy('tbl_size.id_size','desc')->get();
        return view('admin.edit_products', compact('edit_products', 'cate_pro', 'list_color', 'list_size'));
    }
    
    public function update_products(Request $request, $pro_id){
        $data = [
            'product_name' => $request->product_name,
            'product_content' => $request->product_content,
            'product_price' => $request->product_price,
            'category_id' => $request->product_cate
        ];
    
        $product = Products::find($pro_id);
        $get_image = $request->file('product_image');
        if ($get_image) {
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads',$new_image);
            $data['product_image'] = $new_image;
            
        }
        $product->update($data);

        Color::where('id_product', $pro_id)->delete();
        Size::where('id_product', $pro_id)->delete();

        $colors = $request->color;
        $sizes = $request->size;

        if (!empty($colors) && is_array($colors)) {
            foreach ($colors as $color) {
                Color::create([
                    'id_product' => $product->product_id,
                    'color' => $color,
                ]);
            }
        }
        if (!empty($sizes) && is_array($sizes)) {
            foreach ($sizes as $size) {
                Size::create([
                    'id_product' => $product->product_id,
                    'size' => $size,
                ]);
            }
        }
        foreach ($colors as $color) {
            foreach ($sizes as $size) {
                ProductAttribute::create([
                    'id_product' => $product->product_id,
                    'color' => $color,
                    'size' => $size,
                ]);
            }
        }

        Session::put('message', 'Cập nhật sản phẩm thành công.');
        return Redirect::to('list-products');
    }
    
    public function remove_products($pro_id){
        DB::table('tbl_products')->where('product_id',$pro_id)->delete();
        Color::where('id_product', $pro_id)->delete();
        Size::where('id_product', $pro_id)->delete();
        Session::put('message', 'Xóa danh mục sản phẩm thành công.');
        return Redirect::to('list-products');
    }

    //Function Clients
    public function category_details($pro_id){ 
        $cate_pro = DB::table('tbl_category_products')->where('category_status','1')->orderBy('category_id','desc')->get();
    
        $pro_details = DB::table('tbl_products')->join('tbl_category_products','tbl_category_products.category_id','=','tbl_products.category_id')->where('tbl_products.product_id', $pro_id)->get(); 
        $list_color = Color::join('tbl_products','tbl_products.product_id','=','tbl_color.id_product') ->where('tbl_products.product_id', $pro_id) -> orderBy('tbl_color.id_color','asc')->get();
        $list_size = Size::join('tbl_products','tbl_products.product_id','=','tbl_size.id_product') ->where('tbl_products.product_id', $pro_id) -> orderBy('tbl_size.id_size','asc')->get();  
        return view('pages.category.category_details', compact('cate_pro', 'pro_details', 'list_color', 'list_size'));
    }
    
}

