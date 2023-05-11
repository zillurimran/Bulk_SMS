<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function index()
    {
        $offers = Offer::all();
        return view('admin.offers.index', compact('offers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'offer' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        // dd('Vaildation passed');
        Offer::create($request->except('_token') + ['status' => 'show', 'created_at' => Carbon::now()]);

        return redirect()->back()->with('success', 'Offer created successfully');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'offer' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
        ]);

        Offer::findOrFail($id)->update($request->except('_token'));

        return redirect()->back()->with('success', 'Offer updated successfully');
    }

    public function delete(Request $request)
    {
        Offer::findOrFail($request->id)->delete();
        return redirect()->back()->with('success', 'Offer deleted successfully');
    }
}
