<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Order;
use App\OrderDetail;
use Auth;
use DB;
use Validator,Redirect,Response;

class OrderController extends Controller
{
    //
    public function index()
    {
        //die("m on thankyo page");
        return view('checkout.thankyou');
    }

    public function show(Request $request)
    {
        // get current user id
        $userid=Auth::user()->id;
        // get cart data according to current user id 
        $results = Cart::where('user_id', $userid)->select('product_id','quantity','price')->get();
        // return data on checkout show page
        return view('checkout.show')->with(['results' => $results]);
        
    }
    public function submit(Request $request)
    {
        // get current user id

        $userid=Auth::user()->id;
        // return $request;
        // checkout form field validation
        
        request()->validate([
            'first_name' => ['required', 'max:10'],
            'last_name' => ['required', 'max:10'],
            'address' => ['required'],
            'city' => ['required'],
            'state' => ['required'],
            'country' => ['required'],
            'zip_code' => ['required'],
            'phone_number' => ['required','numeric'],
        ]);
       
        // save form data into orders table
        $order_data = new Order();
        $order_data->user_id = $userid;
        $order_data->first_name = $request->first_name;
        $order_data->last_name = $request->last_name;
        $order_data->phone_number = $request->phone_number;
        $order_data->address = $request->address;
        $order_data->city = $request->city;
        $order_data->state = $request->state;
        $order_data->country = $request->country;
        $order_data->zip_code = $request->zip_code;
      
        $order_data->save();
        
        // get order id from order table
        $orders = Order::where('user_id', $userid)->select('id')->get();
        foreach($orders as $order_id){
           echo $order_id = $order_id['id'];
        }
        
        // get data from cart table of current user
        $results = Cart::where('user_id', $userid)->select('product_id','quantity','price')->get();
        foreach($results as $result){
            // save cart data into order detais table
            $order_details = new OrderDetail();
            $order_details->order_id = $order_id;
            $order_details->product_id = $result['product_id'];
            $order_details->quantity = $result['quantity'];
            $order_details->price = $result['price'];
            $order_details->save();
        }
    
        // get data from order_details table
        $results = OrderDetail::where('order_id', $order_id)->select('product_id')->get();
        foreach($results as $result){
            $product_id = $result['product_id'];
            // delete records from cart which are inserted in order_details
            $delete_cart = DB::table('carts')->where('user_id', $userid)->where('product_id', $product_id)->delete();
        }

       // set message of success
        session()->flash('message', 'Order done successfully!');
    // return on thankyou page
    return Redirect::to('checkout/thankyou');
      
    }
}
