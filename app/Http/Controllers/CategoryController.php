<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;
class CategoryController extends Controller
{
    public function addCategory(Request $request){
     if($request->isMethod('post')){
           $request->validate([
                'category_name'=>'required',
                'description'=>'required',
                'url'=>'required',
            ]);
            $data=$request->all();
            //echo "<pre>";print_r($data);die;
           $categories = new category;
           $categories->name=$data['category_name'];
           $categories->parent_id= $data['parent_id'];
           $categories->description=$data['description'];
           $categories->url =$data['url'];
           //print_r($categories);die;
           $categories->save();
           return redirect()->intended('/admin/view-categories')->with('flash_message_success','Category is added successfully!');
       } 
        $levels = category::where(['parent_id'=>0])->get();
        return view('admin.categories.add_category',compact('levels'));
    }
    
    public function editCategory(Request $request,$id=null){
    	if($request->isMethod('post')){
    		$data = $request->all();
    		//echo "<pre>";print_r($data);die;
    		category::where(['id'=>$id])->update(['name'=>$data['category_name'],'description'=>$data['description'],'url'=>$data['url']]);
    		return redirect()->intended('/admin/view-categories')->with('flash_message_success','Category is updated successfully!');
    	}
    	$categoryDetail=category::where(['id'=>$id])->first();
         $levels = category::where(['parent_id'=>0])->get();
    	return view('admin.categories.edit_category',compact('categoryDetail','levels'));
    }
    public function deleteCategory($id){
    	if(!empty($id)){
    		category::where(['id'=>$id])->delete();
    		return redirect()->back()->with('flash_message_success','Category is deleted successfully!');
    	}
    }
    public function viewCategory(){
    	$categories=category::all();
    	return view('admin.categories.view_categories',compact('categories'));
    }
}
