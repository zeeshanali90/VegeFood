<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CheckoutItem;
class ItemControlller extends Controller
{

    function list_detail(){
        $orderData=CheckoutItem::all();
        return view('panel/list_detail',['orderData'=>$orderData]);
    }



        public function oder_detail($id)
    {
        $orderData = CheckoutItem::where('checkout_id', $id)->get();
        if ($orderData->isEmpty()) {
            return redirect()->back()->with('error', 'Order not found');
        }
        return view('panel.list_detail', ['orderData' => $orderData]);
    }


}
