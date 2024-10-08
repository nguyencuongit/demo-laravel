<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Http\Requests\AddProductRequest;
use App\Http\Requests\EditProductRequest;
use App\Slug\Slug;

class ProductController extends Controller
{
    //
    public function index(Request $request){
        // $product = DB::table("products")
        // ->join("category", "products.category_id", "=" , "category.id")
        // ->select("products.id as prd_id", "code", "products.name as prd_name", "category.name as cat_name", "price", "image", "state")
        // ->orderBy("products.id", "DESC")
        // ->limit(5)
        // ->get()
        // ->all();
        $product= Product::orderBy("id", "DESC")
                ->paginate(5);           // tuong duong voi ->get()->all();
        return view("backend/products/listproduct", ["products"=>$product]);
    }

    public function store(AddProductRequest $request){
       
        if($request->hasFile("image")){
            $slug =Slug::getSlug($request->name);
       
            $file =$request->image;
            $file_extension = $file->getClientOriginalExtension(); // duoi file anh (jpg, ....png...)
            $file_name = $slug.".".$file_extension;
            $file->move("uploads",$file_name);
           
            $addproduct = new Product();
            $addproduct->name = $request->name;
            $addproduct->code = $request->code;
            $addproduct->info = $request->info;
            $addproduct->price = $request->price;
            $addproduct->describer = $request->describer;
            $addproduct->featured = $request->featured;
            $addproduct->state = $request->state;
            $addproduct->category_id = $request->category_id;
            $addproduct->slug = $slug;
    
            $addproduct->image = $file_name;
            $addproduct->save();

            $request->session()->flash("alert", "Đã thêm thành công");

            return redirect("/admin/product");
        }
       
    }
    public function create(){
        $category = Category::all()->toArray();
        return view("backend/products/addproduct",["category"=>$category]);
    }
    
    public function edit(Request $request){
        $category = Category::all()->toArray();
        $product = Product::find($request->id)->toArray();
       
        return view("backend/products/editproduct", ["product"=>$product, "category"=>$category]);
    }
    public function update(EditProductRequest $request){
        $slug =Slug::getSlug($request->name);
        $product = Product::find($request->id);
        
        $product->name = $request->name;
        $product->code = $request->code;
        $product->info = $request->info;
        $product->price = $request->price;
        $product->describer = $request->describer;
        $product->featured = $request->featured;
        $product->state = $request->state;
        $product->category_id = $request->category_id;
        $product->slug = $slug;

        if($request->hasFile("image")){
            $file =$request->image;
            $file_extension = $file->getClientOriginalExtension(); // duoi file anh (jpg, ....png...)
            $file_name = $slug.".".$file_extension;
            $file->move("uploads",$file_name);
            $product->image = $file_name;

        }
        $product->save();

        $request->session()->flash("alert", "sửa sp thành công");

        return redirect("/admin/product");
    }
    public function delete(Request $request){

        $product = Product::find($request->id);
        $product->delete();
        $request->session()->flash("alert", "đã xóa thành công");


        return redirect("/admin/product");
    }    
}
