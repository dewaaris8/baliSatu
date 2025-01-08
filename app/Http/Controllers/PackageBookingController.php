<?php

namespace App\Http\Controllers;

use App\Models\PackageBooking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PackageBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    // Start the query and include related data (customer and tour)
    $query = PackageBooking::with(['customer', 'tour'])
                           ->where('is_paid', true)  // Filter by paid bookings only
                           ->orderByDesc('id');  // Order by the most recent bookings

    // Filter by Month if provided
    if ($request->has('month') && $request->filled('month')) {
        $month = $request->input('month');
        if (is_numeric($month) && $month >= 1 && $month <= 12) {
            $query->whereMonth('created_at', $month);
        } else {
            return redirect()->route('admin.package_bookings.index')->withErrors(['month' => 'Invalid month specified.']);
        }
    }

    // Filter by Year if provided
    if ($request->has('year') && $request->filled('year')) {
        $year = $request->input('year');
        if (is_numeric($year) && $year >= 1900 && $year <= date('Y')) {
            $query->whereYear('created_at', $year);
        } else {
            return redirect()->route('admin.package_bookings.index')->withErrors(['year' => 'Invalid year specified.']);
        }
    }

    // Retrieve the filtered bookings
    $package_bookings = $query->paginate(10);

    return view('admin.package_bookings.index', compact('package_bookings'));
}



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PackageBooking $packageBooking)
    {
        //
        return view('admin.package_bookings.show',compact('packageBooking'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PackageBooking $packageBooking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PackageBooking $packageBooking)
    {
        //
        DB::transaction(function () use ($packageBooking) {
            $packageBooking->update(['is_paid' => true,]);
        });
        return redirect()->route('admin.package_bookings.show', $packageBooking);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PackageBooking $packageBooking)
    {
        //
    }
}
