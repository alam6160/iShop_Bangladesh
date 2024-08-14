<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Time;

class TimerController extends Controller
{
    public function index()
    {
        $hotDeals = Time::first();
        return view('backend.setting.HotDeal_time', compact('hotDeals'));
    }

    public function HotDealTimeUpdate(Request $request)
{
    $request->validate([
        'start_time' => 'required|date',
        'end_time' => 'required|date|after:start_time',
    ]);

    // Assuming there's only one hot deal time, you can use the first() method.
    // If you need to update a specific record, pass the ID as a hidden field in the form and use find($id).
    $hotDealTime = Time::first();

    if ($hotDealTime) {
        $hotDealTime->update([
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'active' => $request->active,
        ]);
        $notification = array(
			'message' => 'Hot deal time updated successfully.',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);
    } else {
        // If no record exists, you can create a new one or return an error.
        return redirect()->back()->with('error', 'No hot deal time found to update.');
    }
}
}
