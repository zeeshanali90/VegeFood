<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
class CategoriesController extends Controller
{
    function index() {
        return view('panel/category',['data'=>false]);
    }
    function edit($catId) {
        $categoryData=categories::find($catId);
        return view('panel/category',['data'=>$categoryData]);
    }
    function list_category(){
        $categoryData=categories::all();
        return view('panel/list_category',['categoryData'=>$categoryData]);
    }

    function delete($deleteId){
        $categoryData=categories::find($deleteId)->delete();
        flashy()->success('Category has been deleted','');
        return redirect()->back();
    }

    function submit (Request $reqst){
        $categoryvalid= $reqst->validate([
            'name'=>'required',
            'status'=>'required',
        ]);

       Categories::create([
        'name'=>$reqst->name,
        'status'=>$reqst->status,
       ]);
       flashy()->success('Category has been created','');
       return redirect()->back();
    //    ->with('success','category has been deleted')
}

function update(Request $reqst){

    $productvalid=$reqst->validate([
        'name'=>'required',
        'status'=>'required',
    ]);
    // $category = Categories::where('cat_id', $reqst->cat_id)->first();
    Categories::find($reqst->cat_id)->update([
        'name'=>$reqst->name,
        'status'=>$reqst->status,
    ]);
    flashy()->success('category has been updated','');
    return redirect()->back();
}
}
