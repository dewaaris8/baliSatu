<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTourInclusionsRequest;
use App\Http\Requests\UpdateTourInclusionsRequest;
use App\Models\PackageTour;
use App\Models\TourInclusion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TourInclusionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tourInclusions = TourInclusion::orderByDesc('id')->paginate(10);
        return view('admin.tour_inclusions.index', compact('tourInclusions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $packageTour = PackageTour::orderByDesc('id')->get();
        return view('admin.tour_inclusions.create', compact('packageTour'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTourInclusionsRequest $request)
    {
        DB::transaction(function () use ($request) {
            $validated = $request->validated();
            TourInclusion::create($validated);
        });

        return redirect()->route('admin.tour_inclusions.index')->with('success', 'Tour Inclusion added successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TourInclusion $tourInclusion)
    {
        $packageTour = PackageTour::orderByDesc('id')->get();
        return view('admin.tour_inclusions.edit', compact('tourInclusion', 'packageTour'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTourInclusionsRequest $request, TourInclusion $tourInclusion)
    {
        DB::transaction(function () use ($request, $tourInclusion) {
            $validated = $request->validated();
            $tourInclusion->update($validated);
        });

        return redirect()->route('admin.tour_inclusions.index')->with('success', 'Tour Inclusion updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TourInclusion $tourInclusion)
    {
        $tourInclusion->delete();
        return redirect()->route('admin.tour_inclusions.index')->with('success', 'Tour Inclusion deleted successfully.');
    }
}
