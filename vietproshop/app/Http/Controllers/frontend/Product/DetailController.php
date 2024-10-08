<?php

namespace App\Http\Controllers\frontend\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    //
    public function detail(Request $request){

        $id = $request->id;
        $product = Product::where("id", $id)->get()->toArray();
        $product_new = Product::orderBy("id", "DESC")->limit(4)->get()->toArray();
        // dd($product);

        return view("../frontend/product/detail", ["product"=>$product,  "product_new"=>$product_new]);
    }
    public function shop(Request $request){

        $category = Category::all();
        $product = Product::orderBy("id", "DESC")->paginate(12);
        // dd($category);

        return view("../frontend/product/shop",['product'=>$product, "category"=>$category]) ;
    }
    public function filter(Request $request){

        $product = Product::where("price", ">=", $request->start)
                        ->where("price", "<=", $request->end)
                        ->paginate(12);
                        
        return view("../frontend/product/shop",['product'=>$product]) ;

    }

    public function getCat(Request $request){
        $slug = $request->slug;
        $category = Category::all();
        $product = Category::where("slug", $slug)->first()->product()->paginate(6);
        // dd($product);

        return view("../frontend/product/shop",['product'=>$product, "category"=>$category]) ;

    }
    
}
