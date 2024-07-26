<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Session;
use Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderMail;

class CashController extends Controller
{
     public function CashOrder(Request $request){


    	if (Session::has('coupon')) {
    		$total_amount = Session::get('coupon')['total_amount'];
    	}else{
    		$total_amount = round(Cart::total());
    	}
	  // dd($charge);

     $order_id = Order::insertGetId([
     	'user_id' => Auth::id(),
     	'division_id' => $request->division_id,
     	'district_id' => $request->district_id,
     	'state_id' => $request->state_id,
     	'name' => $request->name,
     	'email' => $request->email,
     	'phone' => $request->phone,
     	'post_code' => $request->post_code,
     	'notes' => $request->notes,

     	'payment_type' => 'Cash On Delivery',
     	'payment_method' => 'Cash On Delivery',

     	'currency' =>  'bdt',
     	'amount' => $total_amount,
     	'invoice_no' => 'Rifa'.mt_rand(10000000,99999999),
     	'order_date' => Carbon::now()->format('d F Y'),
     	'order_month' => Carbon::now()->format('F'),
     	'order_year' => Carbon::now()->format('Y'),
     	'status' => 'pending',
     	'created_at' => Carbon::now(),

     ]);

     // Start Send Email
     $invoice = Order::findOrFail($order_id);
     	$data = [
     		'invoice_no' => $invoice->invoice_no,
     		'amount' => $total_amount,
     		'name' => $invoice->name,
     	    'email' => $invoice->email,

     	];

     	Mail::to($request->email)->send(new OrderMail($data));

     // End Send Email
     $carts = Cart::content();
     foreach ($carts as $cart) {
     	OrderItem::insert([
     		'order_id' => $order_id,
     		'product_id' => $cart->id,
     		'color' => $cart->options->color,
     		'size' => $cart->options->size,
     		'qty' => $cart->qty,
     		'price' => $cart->price,
     		'created_at' => Carbon::now(),

     	]);
     }


     if (Session::has('coupon')) {
     	Session::forget('coupon');
     }

     Cart::destroy();

     $notification = array(
			'message' => 'Your Order Placed Successfully.We will Contract you soon',
			'alert-type' => 'success'
		);

		return redirect()->route('dashboard')->with($notification);


    } // end method

    public function CashOrderGuest(Request $request)
    {
        dd($request->amount);
        // Calculate total amount without considering the coupon
        $total_amount = 100;

        // Create the order for the guest user
        $order = new Order();
        $order->division_id = $request->division_id;
        $order->district_id = $request->district_id;
        $order->state_id = $request->state_id;
        $order->name = $request->name;
        $order->email = $request->email;
        $order->phone = $request->phone;
        $order->post_code = $request->post_code;
        $order->notes = $request->notes;
        $order->payment_type = 'Cash On Delivery';
        $order->payment_method = 'Cash On Delivery';
        $order->currency = 'BDT';
        $order->amount =$request->amount;
        $order->invoice_no = 'Rifa' . mt_rand(10000000, 99999999);
        $order->order_date = Carbon::now()->format('d F Y');
        $order->order_month = Carbon::now()->format('F');
        $order->order_year = Carbon::now()->format('Y');
        $order->status = 'pending';
        $order->created_at = Carbon::now();
        $order->user_id = null;

        // Save the order
        $order->save();
        $order_id = $order->id;

        // Send email notification
        $data = [
            'invoice_no' => $order->invoice_no,
            'amount' => $total_amount,
            'name' => $order->name,
            'email' => $order->email,
        ];
        Mail::to($request->email)->send(new OrderMail($data));

        // Insert order items
        $carts = Cart::content();
        foreach ($carts as $cart) {
            OrderItem::create([
                'order_id' => $order_id,
                'product_id' => $cart->id,
                'color' => $cart->options->color,
                'size' => $cart->options->size,
                'qty' => $cart->qty,
                'price' => $cart->price,
            ]);
        }

        // Clear cart and coupon session data
        // if (Session::has('coupon')) {
        //     Session::forget('coupon');
        // }
        // Cart::destroy();

        // Redirect back with success message
        $notification = [
            'message' => 'Your Order Placed Successfully.We will Contract you soon',
            'alert-type' => 'success',
        ];

        return redirect('/')->with($notification);
    }





}
