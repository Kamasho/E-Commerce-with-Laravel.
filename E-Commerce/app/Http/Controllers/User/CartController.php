<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\cart;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function addProductToCart(Request $request){
        $product_id = $request->input('product_id');
        $product_quantity = $request->input('product_quantity');

        if(Auth::check()){
            $product_check = product::where('id', $product_id)->first();

            if($product_check){
                if(cart::where('product_id', $product_id)->where('user_id', Auth::id())->exists()){
                    return response()->json(['status' => $product_check->name." already added to the carts"]);
                }else{
                    $cart_item = new cart();
                    $cart_item->product_id = $product_id;
                    $cart_item->user_id = Auth::id();
                    $cart_item->product_quantity = $product_quantity;
                    $cart_item->save();
                        return response()->json(['status' => $product_check->name." added to the carts"]);
                }
            }
        }else{
            return response()->json(['status' => "Login to continue"]);
        }
    }
}
