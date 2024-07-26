<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Time;

class TimerController extends Controller
{
    public function index()
    {
        $hotDeals = Time::all();
        return view('backend.setting.HotDeal_time', compact('hotDeals'));
    }

    public function HotDealTimeUpdate(Request $request)
    {
        $request->validate([
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
        ]);

        Time::create([
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'active' => 1,
        ]);

        return redirect()->back()->with('success', 'Hot deal time set successfully.');
    }
}
