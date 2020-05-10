<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Cart;
use Auth;
use DB;
use Validator,Redirect,Response;
class CartController extends Controller
{
    //
    public function index()
    {
        //die("m here");
        //get current user id
        $userid=Auth::user()->id;
       
       // get data from carts and products table with the help of join
       $carts = "Select carts.id,carts.price,carts.quantity,products.image,products.name,products.category_id FROM carts,products WHERE carts.product_id = products.id AND carts.user_id = $userid ";
       $results = DB::select(DB::raw($carts));

       // return on show page of cart
        return view('cart.show')->with(['results' => $results]);
        
        
    }

public function getData(Request $request){
   //dd($request->all());  //to check all the data dumped from the form
   //if your want to save data in cart table
   $cart = new Cart();
   
    // get current user id
     $userid=Auth::user()->id;
     $id = $request->id;   
      
    // $userid=Auth::user()->id;
            
            $check = Cart::where('product_id', $id)->where('user_id', $userid)->count();
            // return $check;
            if ($check > 0) {
                // get data from cart if product and user id is in the cart table
                $result = Cart::where('product_id', $id)->where('user_id', $userid)
                ->select('quantity')->first();

                $quantity = $result->quantity; 
                $quantity = $quantity + 1;
                $newprice = $request->price;
                // set price according to the product quantity
                $tnewprice = $newprice * $quantity;

               // update cart price and quantity according to new data
               Cart::where('product_id', $id)->where('user_id', $userid)
                ->update(['quantity' => $quantity,'price' => $tnewprice]);

               
                // die("m here");

            } else {
                // if no record in carts table with same product id and user id than save new record.
                $cart = new Cart();
                $cart->product_id = $request->id;
                $cart->user_id = $userid;
                $cart->quantity = 1;
                $cart->price = $request->price;
                $cart->save();
            }
        session()->flash('message', 'Product added into cart successfully!');  
        return Redirect::to('cart/show');
}
public function update(Request $request, $id){
    //$date = Cart::all();
    // get current user id
    $userid=Auth::user()->id;
    // get data from cart table
    $cartdata = Cart::where('id', $id)->select('product_id')->first();
    $product_id = $cartdata['product_id'];
    // get data from product table
    $product_price = Product::where('id', $product_id)->select('price')->first();
    $price = $product_price['price'];
    //print_r($price);
    //print_r($request->qty);
   
    $check = Cart::where('id', $id)->where('user_id', $userid)->count();
            // return $check;
            if ($check > 0) {
                // if there is any record in cart table
                $quantity = $request->qty; 
                $newprice = $price;
                // set price according to quantity
                $tnewprice = $newprice * $quantity;
            }
    // update cart      
    $updated_cart = DB::table('carts')
              ->where('id', $id)
              ->where('user_id',  $userid)
              ->update(['quantity' => $quantity,'price' => $tnewprice]);
              session()->flash('message', 'Quantity was updated successfully!');
              return Redirect::to('cart/show');
    
}
public function delete($id){
    //$date = Cart::all();
    //die("sfd");
    // delete data from cart table
    $delete_cart = DB::table('carts')->where('id', $id)->delete();
    session()->flash('delete_message', 'Food Item was deleted successfully!');

    return Redirect::to('cart/show');
}
}
