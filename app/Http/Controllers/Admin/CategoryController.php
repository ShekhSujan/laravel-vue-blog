<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
class CategoryController extends Controller
{
    public function index()
    {
        $categories=Category::get();
        return response()->json([
            'categories'=>$categories

        ],200);
    }
    public function getActiveCategories()
    {
        $categories=Category::where('status',1)->get();
        return response()->json([
            'categories'=>$categories

        ],200);
    }
    public function store(Request $request)
    {
        $request->validate([
            "name"=>'required',
            'status'=>'required'
        ]);
        Category::create([
            "name"=>$request->name,
            "slug"=>slugify($request->name),
            'status'=>$request->status,
        ]);
        return $request;
    }
    public function show($id)
    {
       $category=Category::where('id',$id)->first();
       return response()->json(['category'=>$category],200);
    }

    public function edit($id)
    {
        //
    }
    public function update(Request $request)
    {
        $request->validate([
            "name"=>'required',
            'status'=>'required'
        ]);
        $id=$request->id;
        $arr=[
            "name"=>$request->name,
            "slug"=>slugify($request->name),
            'status'=>$request->status,
        ];
       $category=Category::where('id',$id)->update($arr);
       if($category){
        return response()->json(['success'=>true],200);
       }else{
        return response()->json(['success'=>false],200);
       }
    }

    public function destroy($id)
    {
        $category=Category::find($id);
        $category->delete();
    }
    public function removeItems(Request $request)
    {
        $sl=0;
        foreach ($request->data as $id) {
           $category=Category::find($id);
           $category->delete(); 
           $sl++;
       }
       return response()->json(['success'=> $sl.' Category deleted'],200);
    }
    public function changeStatus(Request $request)
    {
       $sl=0;
        foreach ($request->data as $id) {
           $category=Category::find($id);
           $category->status=$request->status;
           $category->save();
           $sl++;
       }
       return response()->json(['success'=> $sl.' Category Updated'],200);
        
    }
}
