<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use App\Models\Products;
use App\Models\Color;
use App\Models\Size;
use App\Models\ProductAttribute;
use App\Models\Attribute;
use Illuminate\Support\Facades\Redirect;
session_start();

class AttributeController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('admin');   
        }else{
            return Redirect::to('login')->send();
        }
    }
    public function add_attribute(Request $request, $pro_id){
        $list = ProductAttribute::join('tbl_products','tbl_products.product_id','=','tbl_product_attribute.id_product')->where('id_product', $pro_id) -> orderBy('tbl_product_attribute.id_attr','desc')->get();
        $value = Attribute::where('id_product',$pro_id)->orderBy('tbl_attribute.id_attr','asc')->get();
        return view('admin.attribute', compact('list','value'));
    }
    public function update_attribute(Request $request, $pro_id){    
        $id = ProductAttribute::where('id_product', $pro_id)->pluck('id_attr')->first();
        $quantities = $request->quantity; 
        Attribute::where('id_product', $pro_id)->delete();

        foreach ($quantities as $quantity) {
            Attribute::create([
                'id_product' => $pro_id,
                'id_attr' => $id,
                'quantity' => $quantity,
            ]);
        }

        return Redirect::to('list-products');
    }
    
   
}
