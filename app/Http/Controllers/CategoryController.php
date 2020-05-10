<?php

namespace App\Http\Controllers;
use App\Category;
use DB;
use Auth;
use Validator,Redirect,Response;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index(){
       // get current user id
    $userid=Auth::user()->id;
    if($userid == 1){
        return view('admin/category/index');
    }else{
        return view('sorry');
    }
    }
  
    
    public function add(Request $request){

            // get current user id
    $userid=Auth::user()->id;
    if($userid == 1){
        // get data from submitted form
        $category_name = $request->name;
        // add data in category table
        $category = new Category();
            $category->name = $category_name;
            $category->save();
 
            $category = Category::all();
            // set return page
            return view('admin/category/show')->with('category', $category);
    }else{
        return view('sorry');
    }
    }
    public function show(){
              // get current user id
    $userid=Auth::user()->id;
    if($userid == 1){
        // get data from categories table
        $category = Category::all();
         // return data on category show page
            return view('admin/category/show')->with('category', $category);
    }else{
        return view('sorry');
    }
    }
    public function update($id,Request $request){
    // get current user id
    $userid=Auth::user()->id;
    if($userid == 1){
        // get data and get new name of category
        $name = $request->name;
        // update the name of category
        Category::where('id', $id)->update(['name' => $name]);
 
        $category = Category::all();
        // show updated values on show page
        return view('admin/category/show')->with('category', $category);
    }else{
        return view('sorry');
    }
    }
    public function delete($id){
        
        //die("sfd");
        // detele category
        // get current user id
    $userid=Auth::user()->id;
    if($userid == 1){
        $delete_cart = DB::table('categories')->where('id', $id)->delete();
        return Redirect::to('admin/category/show')->withSuccess('Product Deleted');
    }else{
        return view('sorry');
    }
    }
 
}
