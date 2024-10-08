<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function index(Request $request){
        $product = Product::where("featured", 1)->limit(4)->get()->toArray();
        $product_new = Product::orderBy("id", "DESC")->limit(8)->get()->toArray();
        // dd($product);
        return view("../frontend/index" , ["product"=>$product, "product_new"=>$product_new]) ;
    }
    public function about(){
        return view("../frontend/about/about");
    }
    public function contact(){
        return view("../frontend/contact/contact");
    }
}
