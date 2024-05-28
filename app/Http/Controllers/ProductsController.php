<?php

namespace App\Http\Controllers;
use App\Models\Products;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductsController extends Controller
{

   

     function addToCart($id)
    {
        $productsData = Products::find($id);
        return view('cart',['productsData'=>$productsData]);
    }
    function shop($id)
    {
        $productsData = Products::find($id);
        return view('shop',['productsData'=>$productsData]);
    }

//showing products  and slider on home page
    function index()
    {
        $sliderData = Slider::all();
        $productsData = products::all();
        return view('index', ['productsData' => $productsData,'sliderData' => $sliderData]);
    }
    //end

    function product_index() {
        return view('panel/products',['data'=>false]);
    }
    function edit($productId) {
        $productsData=products::find($productId);
        return view('panel/products',['data'=>$productsData]);
    }

    function delete($delId){
        $productData=products::find($delId)->delete();
        flashy()->success('Product has been deleted','');
        return redirect()->back();
    }

    function list_products(){
        $productsData=products::all();
        return view('panel/list_products',['productsData'=>$productsData]);
    }


    function submit(Request $reqst){
            $productvalid=$reqst->validate([
                'product_name'=>'required',
                'product_img'=>'required',
                'purchasing_price'=>'required',
                'selling_price'=>'required',
                'is_available'=>'required',
            ]);

            if($reqst->has('product_img')){

                $file=$reqst->file('product_img');
                $extension=$file->getClientOriginalExtension();
                $filename=time().'.'.$extension;
                $path='uploads/product/';
                $img_path=$file->move($path,$filename);
            }
            products::create([
                'product_name'=>$reqst->product_name,
                'product_img'=>$path.$filename,
                'purchasing_price'=>$reqst->purchasing_price,
                'selling_price'=>$reqst->selling_price,
                'is_available'=>$reqst->is_available,
            ]);
            flashy()->success('Product has been created','');
            return redirect()->back();
    }

    function update(Request $reqst){
            $productvalid=$reqst->validate([
                'product_name'=>'required',
                'product_img'=>'nullable',
                'purchasing_price'=>'required',
                'selling_price'=>'required',
                'is_available'=>'required',
            ]);
            $product = Products::where('id', $reqst->id)->first();

            if($reqst->has('product_img')){
                if(File::exists($product->product_img))
                {
                    File::delete($product->product_img);

                }
                $file=$reqst->file('product_img');
                $extension=$file->getClientOriginalExtension();
                $filename=time().'.'.$extension;
                $path='uploads/product/';
                $img_path=$file->move($path,$filename);

                $product->product_img=$img_path;
            }

            $product->update([
                'product_name'=>$reqst->product_name,
                'purchasing_price'=>$reqst->purchasing_price,
                'selling_price'=>$reqst->selling_price,
                'is_available'=>$reqst->is_available,
            ]);
            flashy()->success('Product has been updated','');
            return redirect()->back();
    }
}
