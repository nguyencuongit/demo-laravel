<?php

namespace App\Http\Controllers\frontend\Cart;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    //
    public function cart(Request $request){
        $data["cart"] = Cart::content();
        $data["priceTotal"] = Cart::priceTotal();
        $request->session()->put("cartNotify", Cart::count());
        return view("../frontend/cart/cart", $data);
    }
    public function addToCart(Request $request){
        $qty = $request->quantity? $request->quantity:1;
        $product = Product::find($request->id);
        Cart::add([
            "id"=>$product->id,
            "name"=>$product->name,
            "price"=>$product->price,
            "qty"=>$qty,
            "weight"=>0,
            "options"=>["code"=>$product->code,"image"=>$product->image]
        ]);
        

        return redirect("/cart") ;
    }
    public function updateCart(Request $request){

        $cart = Cart::update($request->rowId, $request->qty);
        // dd($cart);
        return "updated";
    }
    public function deleteCart(Request $request){
        Cart::remove($request->rowId);
        return "deleted" ;
    }
    public function checkout(){
        return ;
    }
    public function payment(){
        return ;
    }
    public function complete(){
        return ;
    }
}
