<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTourPlansRequest;
use App\Http\Requests\UpdateTourPlanRequest;
use App\Models\PackageTour;
use App\Models\TourPlan;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TourPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $tourPlans = TourPlan::orderByDesc('id')->paginate(10);
        return view('admin.tour_plans.index', compact('tourPlans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $packageTour = PackageTour::orderByDesc('id')->get();
        return view('admin.tour_plans.create', compact('packageTour'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTourPlansRequest $request)
    {
        //
        DB::transaction(function () use ($request) {
            $validated = $request->validated();
            TourPlan::create($validated);
        });

        return redirect()->route('admin.tour_plans.index')->with('success', 'Tour Inclusion added successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(TourPlan $tourPlan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TourPlan $tourPlan)
    {
        //
        $packageTour = PackageTour::orderByDesc('id')->get();
        return view('admin.tour_plans.edit', compact('tourPlan', 'packageTour'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTourPlanRequest $request, TourPlan $tourPlan)
{
    // Use the validated data from the request
    $validated = $request->validated();

    // Update the tour plan record
    DB::transaction(function () use ($validated, $tourPlan) {
        $tourPlan->update($validated);
    });

    return redirect()->route('admin.tour_plans.index')
                     ->with('success', 'Tour Plan updated successfully.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TourPlan $tourPlan)
    {
        //
        $tourPlan->delete();
        return redirect()->route('admin.tour_plans.index')->with('success', 'Tour Plan deleted successfully.');
    }
}
