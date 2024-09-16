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
    public function CashOrder(Request $request)
    {

        if (Session::has('coupon')) {
            $total_amount = Session::get('coupon')['total_amount'];
        } else {
            $total_amount = round(Cart::total());
        }

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
            'currency' => 'bdt',
            'amount' => $total_amount,
            'invoice_no' => 'Rifa_Mart_' . mt_rand(10000000, 99999999),
            'order_date' => Carbon::now()->format('d F Y'),
            'order_month' => Carbon::now()->format('F'),
            'order_year' => Carbon::now()->format('Y'),
            'status' => 'pending',
            'created_at' => Carbon::now(),
        ]);

        $invoice = Order::findOrFail($order_id);

        // Gather product names from the cart
        $carts = Cart::content();
        $productNames = [];
        foreach ($carts as $cart) {
            $productNames[] = $cart->name;
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

        $data = [
            'invoice_no' => $invoice->invoice_no,
            'amount' => $total_amount,
            'name' => $invoice->name,
            'email' => $invoice->email,
            'payment_type' => $invoice->payment_type,
            'order_date' => $invoice->order_date,
            'products' => $productNames,
        ];

        // Send email to the user
        Mail::to($request->email)->send(new OrderMail($data));

        // Send email to the admin
        $adminEmail = 'support@rifamart.com';
        Mail::to($adminEmail)->send(new OrderMail($data));

        if (Session::has('coupon')) {
            Session::forget('coupon');
        }

        Cart::destroy();

        $notification = array(
            'message' => 'Your Order Placed Successfully. We will contact you soon.',
            'alert-type' => 'success',
        );

        return redirect()->route('my.orders')->with($notification);
    }
    // end method

    public function DirectBuyOrder(Request $request)
    {
        //  return $request->all();
        // $total_amount = round($request->finalPrice);
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
            'currency' => 'bdt',
            'amount' => round($request->finalPrice),
            'invoice_no' => 'Rifa_Mart_' . mt_rand(10000000, 99999999),
            'order_date' => Carbon::now()->format('d F Y'),
            'order_month' => Carbon::now()->format('F'),
            'order_year' => Carbon::now()->format('Y'),
            'status' => 'pending',
            'created_at' => Carbon::now(),
        ]);

        $invoice = Order::findOrFail($order_id);

        // Insert the product details into the OrderItem table
        OrderItem::insert([
            'order_id' => $order_id,
            'product_id' => $request->product_id,
            'color' => $request->color,
            'size' => $request->size,
            'qty' => $request->qty,
            'price' => round($request->finalPrice),
            'created_at' => Carbon::now(),
        ]);

        $productNames[] = $request->product_name;

        $data = [
            'invoice_no' => $invoice->invoice_no,
            'amount' => round($request->finalPrice),
            'name' => $invoice->name,
            'email' => $invoice->email,
            'payment_type' => $invoice->payment_type,
            'order_date' => $invoice->order_date,
            'products' => $productNames,
        ];

        // Send email to the user
        Mail::to($request->email)->send(new OrderMail($data));

        // Send email to the admin
        $adminEmail = 'support@rifamart.com';
        Mail::to($adminEmail)->send(new OrderMail($data));
        $notification = array(
            'message' => 'Your Direct Buy Order Placed Successfully. We will contact you soon.',
            'alert-type' => 'success',
        );

        return redirect()->route('my.orders')->with($notification);
    }
}
