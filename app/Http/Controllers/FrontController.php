<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePackageBookingCheckoutRequest;
use App\Http\Requests\StorePackageBookingRequest;
use App\Http\Requests\UpdatePackageBankRequest;
use App\Http\Requests\UpdatePackageBookingRequest;
use App\Models\PackageBank;
use App\Models\PackageBooking;
use App\Models\PackagePhoto;
use App\Models\PackageTour;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FrontController extends Controller
{
    //
    public function index(){
        $package_tours = PackageTour::orderByDesc('id')->take(3)->get();
        return view('front.index', compact('package_tours'));
    }

    public function details(PackageTour $packageTour)
    {
        $latestPhotos = $packageTour->package_photos()->orderByDesc('id')->take(3)->get();
        $reviews = $packageTour->reviews()->latest()->get(); // Retrieve reviews, ordered by the latest
        return view('front.details', compact('packageTour', 'latestPhotos', 'reviews'));
    }
    

    public function book(PackageTour $packageTour){
        return view('front.book', compact('packageTour'));
    }

    public function book_store(StorePackageBookingRequest $request, PackageTour $packageTour){
        $user = Auth::user();
        $bank = PackageBank::orderByDesc('id')->first();
        $packageBookingId = null;
        
        DB::transaction(function () use ($request, $packageTour, $user, $bank, &$packageBookingId) {
            $validated = $request->validated();

            $startDate = new Carbon($validated['start_date']);
            $totalDays = $packageTour->days-1;
            $endDate = $startDate->addDays($totalDays);

            $sub_total = $packageTour->price * $validated['quantity'];
            $insurance = 300000 * $validated['quantity'];
            $tax = $sub_total * 0.10;

            $validated['end_date'] = $endDate;
            $validated['user_id'] = $user->id;
            $validated['is_paid'] = false;
            $validated['proof'] = 'coba2.png';
            $validated['package_tour_id'] = $packageTour->id;
            $validated['package_bank_id'] = $bank->id;
            $validated['insurance'] = $insurance;
            $validated['tax'] = $tax;
            $validated['sub_total'] = $sub_total;
            $validated['total_amount'] = $sub_total + $insurance + $tax;

            // Set your Merchant Server Key
            \Midtrans\Config::$serverKey = config('midtrans.serverKey');
            // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
            \Midtrans\Config::$isProduction = false;
            // Set sanitization on (default)
            \Midtrans\Config::$isSanitized = true;
            // Set 3DS transaction for credit card to true
            \Midtrans\Config::$is3ds = true;

            $params = array(
                'transaction_details' => array(
                    'order_id' => rand(),
                    'gross_amount' => $validated['total_amount'],
                ),
                'customer_details' => array(
                    'first_name' => $user->name,
                    'email' => $user->email,
                ),
            );

            $snapToken = \Midtrans\Snap::getSnapToken($params);

            $validated['snap_token'] = $snapToken;

            $packageBooking = PackageBooking::create($validated);

            $packageBookingId = $packageBooking->id;

        });

        if($packageBookingId){
            return redirect()->route('front.choose_bank', $packageBookingId);
        } else {
            return back()->withErrors('failed to create booking');
        }

        return redirect()->route('front.book_finish');
    }

    public function choose_bank(PackageBooking $packageBooking){
        $user = Auth::user();
        if($packageBooking->user_id != $user->id){
            abort(403);
        }
        $banks = PackageBank::all();
        return view('front.choose_bank', compact('packageBooking', 'banks'));
    }

    public function choose_bank_store(UpdatePackageBookingRequest $request, PackageBooking $packageBooking){ 
        $user = Auth::user();
        if($packageBooking->user_id != $user->id){
            abort(403);
        }

        DB::transaction(function () use ($request, $packageBooking) {
            $validated = $request->validated();
            $packageBooking->update([
                'package_bank_id' => $validated['package_bank_id'],

            ]);
    });
    return redirect()->route('front.book_payment', $packageBooking->id);
    }

    public function book_payment(PackageBooking $packageBooking) {
        return view('front.book_coba', compact('packageBooking'));
    }

    public function book_payment_store(StorePackageBookingCheckoutRequest $request, PackageBooking $packageBooking){
        $user = Auth::user();
        if($packageBooking->user_id != $user->id){
            abort(403);
        }

        // DB::transaction(function () use ($request, $user ,$packageBooking) {
        //     $validated = $request->validated();
        //     if($request->hasFile('proof')){
        //         $proofPath = $request->file('proof')->store('proofs','public');
        //         $validated['proof'] = $proofPath; 
        //     }
        //     $packageBooking->update($validated);        
        // });

        DB::transaction(function () use ($packageBooking) {
            $packageBooking->update(['is_paid' => true,]);
        });

        return redirect()->route('front.book_finish');
        // menit9 tutor 
    }

    public function checkout_success(PackageBooking $packageBooking) {
        DB::transaction(function () use ($packageBooking) {
            $packageBooking->update(['is_paid' => true,]);
        });
        return view('front.book_finish');
    }

    public function book_finish() {
        return view('front.book_finish');
    }

}
