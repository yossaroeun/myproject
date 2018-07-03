<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Image;
use App\category;
use App\product;
use App\ProdutAttribute;
class ProductsController extends Controller
{
    public function addProduct(Request $request){
    	if($request->isMethod('post')){
    		$regex = "/^(?=.+)(?:[1-9]\d*|0)?(?:\.\d+)?$/";
    	  $request->validate([
    	  	'category_id'=>'required',
    	  	'product_name'=>'required',
    	  	'product_code'=>'required',
    	  	'product_color'=>'required',
            'price'=>array('required','regex:'.$regex),
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    	  ]);
          $data=$request->all();
          //echo "<pre>";print_r($data);die;
          $products = new product;
          if(empty($data['category_id'])){
          	return redirect()->back()->with('flash_message_error','Category is missing!');
          }
          $products->category_id=$data['category_id'];
          $products->product_name = $data['product_name'];
          $products->product_code = $data['product_code'];
          $products->product_color = $data['product_color'];
          if(!empty($data['description'])){
          	$products->description = $data['description'];
          }else{
          	$products->description='';
          }
          
          $products->price = $data['price'];
          if ($request->hasFile('image')) {
              $image_tmp = Input::file('image');
              if($image_tmp->isValid()){
              	$extensions = $image_tmp->getClientOriginalExtension();
              	$filename = rand(111,99999).'.'.$extensions;
              	$large_image_part = 'images/backend_images/products/large/'.$filename;
              	$medium_image_part = 'images/backend_images/products/medium/'.$filename;
              	$small_image_part = 'images/backend_images/products/small/'.$filename;
              	// Resize image
              	Image::make($image_tmp)->save($large_image_part);
              	Image::make($image_tmp)->resize(600,600)->save($medium_image_part);
              	Image::make($image_tmp)->resize(300,300)->save($small_image_part);
                // Store product name in products table
                $products->image=$filename;
              }

          }
         // echo "$products";die;
          $products->save();
          return redirect()->back()->with('flash_message_success','Product is added successfully!');
    	} 
    	$categories = category::where(['parent_id'=>0])->get();
    	$categories_dropdown = "<option value='' selected desabled>selete</option>";
    	foreach ($categories as $cat) {
    		$categories_dropdown.="<option value='".$cat->id."'>".$cat->name."</option>";
    		$sub_categories=category::where(['parent_id'=>$cat->id])->get();
    		foreach($sub_categories as $sub){
                 $categories_dropdown.="<option value='".$sub->id."'>&nbsp;&nbsp;-&nbsp;".$sub->name."</option>";
    		}
    	}
    	return view('admin.products.add_product',compact('categories_dropdown'));
    }
    public function editProduct(Request $request,$id=null){
    	if($request->isMethod('post')){
    		$regex = "/^(?=.+)(?:[1-9]\d*|0)?(?:\.\d+)?$/";
    	  $request->validate([
    	  	'category_id'=>'required',
    	  	'product_name'=>'required',
    	  	'product_code'=>'required',
    	  	'product_color'=>'required',
          'price'=>array('required','regex:'.$regex),
          //'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    	  ]);
    		$data = $request->all();
    		//echo "<pre>";print_r($data);die;

    		 if ($request->hasFile('image')) {
              $image_tmp = Input::file('image');
              if($image_tmp->isValid()){
              	$extensions = $image_tmp->getClientOriginalExtension();
              	$filename = rand(111,99999).'.'.$extensions;
              	$large_image_part = 'images/backend_images/products/large/'.$filename;
              	$medium_image_part = 'images/backend_images/products/medium/'.$filename;
              	$small_image_part = 'images/backend_images/products/small/'.$filename;
              	// Resize image
              	Image::make($image_tmp)->save($large_image_part);
              	Image::make($image_tmp)->resize(600,600)->save($medium_image_part);
              	Image::make($image_tmp)->resize(300,300)->save($small_image_part);
                // Store product name in products table
                //$products->image=$filename;
              }
            }else{
              	$filename = $data['current_image'];
         }

            if(empty($data['description'])){
                    $data['description'] = '';	
            }

    		product::where(['id'=>$id])->update(['category_id'=>$data['category_id'],'product_name'=>$data['product_name'],'product_code'=>$data['product_code'],'product_color'=>$data['product_color'],'description'=>$data['description'],'price'=>$data['price'],'image'=>$filename]);
    		return redirect()->intended('/admin/view-product')->with('flash_message_success','Product is updated successfully');
    	}
       $productDetial = product::where(['id'=>$id])->first();
       $categories = category::where(['parent_id'=>0])->get();
    	$categories_dropdown = "<option value='' selected desabled>selete</option>";
    	foreach ($categories as $cat) {
    		if($cat->id == $productDetial->category_id){
    			$seleted = "selected";
    		}else{
    			$seleted = "";
    		}
    		$categories_dropdown.="<option value='".$cat->id."' ".$seleted.">".$cat->name."</option>";
    		$sub_categories=category::where(['parent_id'=>$cat->id])->get();
    		foreach($sub_categories as $sub){
    			if($sub->id == $productDetial->category_id){
    			$seleted = "selected";
    		}else{
    			$seleted = "";
    		}
                 $categories_dropdown.="<option value='".$sub->id."' ".$seleted.">&nbsp;&nbsp;-&nbsp;".$sub->name."</option>";
    		}
    	}
       return view('admin.products.edit_product',compact('productDetial', 'categories_dropdown'));
    }
    public function viewProduct(){
    	$products = product::get();
    	foreach ($products as $key => $value) {
    		$category_name = category::where(['id'=>$value->category_id])->first();
    		$products[$key]->category_name= $category_name->name;
    	}
    	return view('admin.products.view_products',compact('products'));
    }
    public function deleteProductImage($id=null){
    	product::where(['id'=>$id])->update(['image'=>'']);
    	return redirect()->back()->with('flash_message_success','Imate is deleted successfully!');
    }
    public function deleteProduct($id=null ){
    	product::where(['id'=>$id])->delete();
       return redirect()->back()->with('flash_message_success','Products has been delete successfully!');
    }
    public function addAttributes(Request $request,$id=null){
      $productDetial = product::with('attributes')->where(['id'=>$id])->first();
      //echo "<pre>";print_r($productDetial);die;
      if($request->isMethod('post')){
        $data = $request->all();
        //echo "<pre>";print_r($data);die;
        foreach ($data['sku'] as $key => $value) {
          if(!empty($value)){
            $attributes = new ProdutAttribute;
            $attributes->product_id = $id;
            $attributes->sku = $value;
            $attributes->size = $data['size'][$key];
            $attributes->price = $data['price'][$key];
            $attributes->stock = $data['stock'][$key];
            $attributes->save();
          }
        }
        return redirect()->back()->with('flash_message_success','Products attributes has been added successfully!');
      }
      
      return view('admin.products.add_attributes',compact('productDetial'));
    }
    public function deleteAttributes($id=null){
      ProdutAttribute::where(['id'=>$id])->delete();
      return redirect()->back()->with('flash_message_success','Attribute has been deleted successfully!');
    }
}
