<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Facades\File;
class SliderController extends Controller
{
     function index()
{
    $sliderData = Slider::all();
    return view('index', ['sliderData' => $sliderData]);
}
    function slider_index() {
        return view('panel/slider',['data'=>false]);
    }
    function edit($sliderId) {
        $sliderData=Slider::find($sliderId);
        return view('panel/slider',['data'=>$sliderData]);
    }

    function delete($deleteId){
        $sliderData=Slider::find($deleteId)->delete();
        flashy()->success('Slider has been deleted','');
        return redirect()->back();
    }

    function list_slider(){
        $sliderData=Slider::all();
        return view('panel/list_slider',['sliderData'=>$sliderData]);
    }


    function submit(Request $reqst){
            $slidervalid=$reqst->validate([
                'slider_text'=>'required',
                'slider_img'=>'required',
                'slider_description'=>'required',
            ]);

            if($reqst->has('slider_img')){

                $file=$reqst->file('slider_img');
                $extension=$file->getClientOriginalExtension();
                $filename=time().'.'.$extension;
                $path='uploads/slider/';
                $img_path=$file->move($path,$filename);
            }
            Slider::create([
                'slider_text'=>$reqst->slider_text,
                'slider_img'=>$path.$filename,
                'slider_description'=>$reqst->slider_description,
            ]);
            flashy()->success('Slider has been created','');
            return redirect()->back();
    }

    function update(Request $reqst){
            $slidervalid=$reqst->validate([
                'slider_text'=>'required',
                'slider_img'=>'nullable',
                'slider_description'=>'required',
            ]);
            $slider = Slider::where('id', $reqst->slider_id)->first();

            if ($slider) {
                if (file::exists($slider->slider_img)) {
                    file::delete($slider->slider_img);
                }

                $file=$reqst->file('slider_img');
                $extension=$file->getClientOriginalExtension();
                $filename=time().'.'.$extension;
                $path='uploads/slider/';
                $img_path=$file->move($path,$filename);

                $slider->slider_img=$img_path;
            }

            $slider->update([
                'slider_text'=>$reqst->slider_text,
                'slider_img'=>$img_path,
                'slider_description'=>$reqst->slider_description,
            ]);
            flashy()->success('Slider has been updated','');
            return redirect()->back();
    }
}
