<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
class CartController extends Controller
{



    function check($id)
    {
      $cartItem = Cart::where('user_id', auth()->id());
        return view('checkout',['cartItem'=>$cartItem   ]);
    }


    function list_cart(){
        $cartItem=Cart::where('user_id',auth()->user()->id)->get();
        return view('list_cart',['cartItem'=>$cartItem]);
    }

     function remove($cartdelId)
    {
        $cartItem = Cart::find($cartdelId);
            $cartItem->delete();
            flashy()->success('Your Cart has been deleted', '');
        return redirect()->back();
    }

  public function addToCart(Request $request)
    {
        $userId = auth()->id();
        $productId = $request->productId;
        $quantity = $request->quantity;
        $price = $request->price;

        $cartItem = Cart::where('user_id', $userId)
            ->where('product_id', $productId)
            ->first();

        if (!$cartItem) {
            Cart::create([
            'product_id'=>$request->productId,
            'price'=>$request->price,
            'quantity'=>$request->quantity,
            'user_id'=>auth()->id(),
            ]);
        } else {
            $cartItem->quantity += $quantity;
            $cartItem->update();
        }

        $response = [
            'message' => 'Your product has been added to the cart.',
            'status' => 'success',
        ];

        return response()->json($response);
    }
}
