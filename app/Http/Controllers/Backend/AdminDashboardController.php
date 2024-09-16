<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use Carbon\Carbon;

class AdminDashboardController extends Controller
{
    // public function index(){
    //     $date = date('d-m-y');
    //     $today = Order::where('order_date',$date)->sum('amount');

    //     $months = date('F');
    //     $month = Order::where('order_month',$months)->sum('amount');

    //     $year = date('Y');
    //     $year = Order::where('order_year',$year)->sum('amount');

    //     $pending = Order::where('status','pending')->get();
    //     $orders = Order::where('status','pending')->orderBy('id','DESC')->get();
    //     return view('admin.index',compact('date','today','month','year','pending','orders'));

    // }
    public function index()
    {
        $todayDate = Carbon::today()->format('d F Y');
        $today = Order::where('order_date', $todayDate)
        ->where('status', 'delivered')
        ->sum('amount');

        $months = date('F');
        $month = Order::where('order_month',$months)
        ->where('status', 'delivered')
        ->sum('amount');

        $years = date('Y');
        $year = Order::where('order_year',$years)
        ->where('status', 'delivered')
        ->sum('amount');

        // Profit calculations
        $todayProfit = Product::join('orders', 'orders.id', '=', 'products.order_date')
        ->whereDate('orders.order_date', $todayDate)
        ->where('orders.status', 'delivered')
        ->selectRaw('SUM(CASE WHEN discount_price IS NOT NULL THEN discount_price - buying_price ELSE selling_price - buying_price END) as total_profit')
        ->value('total_profit') ?? 0;

        $monthProfit = Product::whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->month)
            ->selectRaw('SUM(CASE WHEN discount_price IS NOT NULL THEN discount_price - buying_price ELSE selling_price - buying_price END) as total_profit')
            ->value('total_profit');

        $yearProfit = Product::whereYear('created_at', Carbon::now()->year)
            ->selectRaw('SUM(CASE WHEN discount_price IS NOT NULL THEN discount_price - buying_price ELSE selling_price - buying_price END) as total_profit')
            ->value('total_profit');

        // Fetching pending orders and paginated orders
        $pending = Order::where('status', 'pending')->get();
        $orders = Order::where('status', 'pending')->orderBy('id', 'DESC')->paginate(10); // Paginated list of pending orders

        // Pass all variables to the view
        return view('admin.index', compact('todayDate','months', 'today', 'month', 'year', 'todayProfit', 'monthProfit', 'yearProfit', 'pending', 'orders'));
    }


}
