<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Checkout;
use App\Models\Cart;
use App\Models\Products;
use App\Models\CheckoutItem;
class CheckoutController extends Controller
{
//for single purchase
    // public function buyNow(Request $request)
    // {
    //     $cartId = $request->input('cart_id');
    //     $cartItem = Cart::where('user_id', auth()->id())
    //                     ->where('cart_id', $cartId)
    //                     ->first();
    //     if ($cartItem) {
    //         $cartItem->delete();
    //         flashy()->success('Your Order has been placed', '');
    //         return redirect()->route('list.cart');
    //     }
    // }


    function order_forward(Request $request){
        $orderData=Checkout::find($request->id);
        if( $orderData){
            $orderData->status = 'forwarded';
            $orderData->save();
            flashy()->success('Order has been forwarded');
            return redirect()->back();
        }
    }

    function order_reject(Request $request){
        $orderData=Checkout::find($request->id);
        if( $orderData){
            $orderData->status = 'Rejected';
            $orderData->save();
            flashy()->success('Order has been Rejected');
            return redirect()->back();
        }

    }

  function list_orders(){
        $Checkout=Checkout::all();
        return view('panel/list_orders',['Checkout'=>$Checkout]);
    }

    function show()
    {
        $cartItem=Cart::where('user_id',auth()->user()->id)->get();
        return view('checkout',['cartItem'=>$cartItem]);


    }

    public function process(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'address' => 'required|string',
            'number' => 'required',
        ]);
        $checkout = Checkout::create($validated);
        $cartItems = Cart::where('user_id', auth()->id())->get();
        foreach ($cartItems as $item) {
            CheckoutItem::create([
                'checkout_id' => $checkout->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->price,
            ]);
        }
        Cart::where('user_id', auth()->id())->delete();
        flashy()->success('Order has been placed');
        return redirect()->route('list.cart');
    }

}
