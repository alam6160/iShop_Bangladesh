<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class AdminDashboardController extends Controller
{
    public function index(){
        $date = date('d-m-y');
        $today = Order::where('order_date',$date)->sum('amount');

        $month = date('F');
        $month = Order::where('order_month',$month)->sum('amount');

        $year = date('Y');
        $year = Order::where('order_year',$year)->sum('amount');

        $pending = Order::where('status','pending')->get();
        $orders = Order::where('status','pending')->orderBy('id','DESC')->get();
        return view('admin.index',compact('date','today','month','year','pending','orders'));

    }

}
