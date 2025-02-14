<?php

namespace App\Http\Controllers;

use App\Models\PackageBooking;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
public function store(Request $request, $packageTourId)
{
    $user = Auth::user();

    // Validate the request
    $request->validate([
        'rating' => 'required|integer|min:1|max:5',
        'review' => 'nullable|string|max:255',
    ]);

    // Check if the user has purchased the package
    $booking = PackageBooking::where('user_id', $user->id)
        ->where('package_tour_id', $packageTourId)
        ->first();

    if (!$booking) {
        return redirect()->back()->with('error', 'You can only review tours you have purchased.');
    }

    // Check if a review already exists for this booking
    $reviewExists = Review::where('user_id', $user->id)
        ->where('package_tour_id', $packageTourId)
        ->where('created_at', '>=', $booking->created_at) // Ensure review is tied to the current booking
        ->exists();

    if ($reviewExists) {
        return redirect()->back()->with('error', 'You have already reviewed this package.');
    }

    // Create a new review
    Review::create([
        'user_id' => $user->id,
        'package_tour_id' => $packageTourId,
        'rating' => $request->rating,
        'review' => $request->review,
    ]);

    // Flash success message
    return redirect()->back()->with('success', 'Review submitted successfully.');
}


    


    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        //
    }
}
