<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Auth;
use DB;
use Validator,Redirect,Response;
use Illuminate\Http\Request;

class ProductController extends Controller
{
     
   public function index()
   {
      //die("m hre");
       $products = Product::all();
       return view('shop')->with('products', $products);
   }

   public function show($id)
   {
       // get data from products table where id is $id
       $product = Product::where('id', $id)->firstOrFail();

       // get data from products where id is not equal to $id
       $interested = Product::where('id', '!=', $id)->get()->random(3);

       // return that data on product page
       return view('product')->with(['product' => $product, 'interested' => $interested]);
   }

   public function category($id)
   {  
       // get product data according to category
       $products = Product::where('category_id', $id)->get();

       // returm data on shop page
       return view('shop')->with(['products' => $products]);
   }
   public function admin()
   {
    //$categories = Category::all();
    $userid=Auth::user()->id;
    if($userid == 1){
    return view('admin.welcome');
    }else{
        return view('sorry');
    }
   }

   // function for add product
   public function product_form()
   {
    // get current user id
    $userid=Auth::user()->id;
    if($userid == 1){
        $categories = Category::all();
        return view('admin/product/index')->with('categories', $categories);
    }else{
        return view('/sorry');
    }
    
   }
   // function for add product
   public function add(Request $request)
   {
    // get current user id
    $userid=Auth::user()->id;
    if($userid == 1){

    //validation
    request()->validate([
        'category_id' => ['required'],
        'name' => ['required'],
        'description' => ['required'],
        'image' => ['required'],
        'price' => ['required','numeric'],
    ]);

    //die("m here");
    // save cart data into order detais table
    $product = new Product();
    $product->category_id = $request['category_id'];;
    $product->name = $request['name'];
    $product->description = $request['description'];
    $product->image = $request['image'];
    $product->price = $request['price'];
    $product->save();
    
    // set message of success
    session()->flash('message', 'Product added successfully!');
    $categories = Category::all();
    return view('admin/product/index')->with('categories', $categories);
   }else{
    return view('sorry');
   }
}
   
}
