<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Details Booking') }}
            </h2>
        </div>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10 flex flex-col gap-y-5">

                <!-- Booking Overview -->
                <div class="item-card flex flex-row justify-between items-center bg-gray-50 p-6 rounded-lg">
                    <div class="flex flex-row items-center gap-x-3">
                        <img src="{{ Storage::url($packageBooking->tour->thumbnail) }}" alt="{{ $packageBooking->tour->name }}" class="rounded-2xl object-cover w-[120px] h-[90px]">
                        <div class="flex flex-col">
                            <h3 class="text-indigo-950 text-xl font-bold">{{ $packageBooking->tour->name }}</h3>
                            <p class="text-slate-500 text-sm">{{ $packageBooking->tour->category->name }}</p>
                        </div>
                    </div>
                    <div class="flex flex-col items-end gap-y-2">
                        @if ($packageBooking->is_paid)
                            <span class="w-fit text-sm font-bold py-2 px-3 rounded-full bg-green-500 text-white">
                                PAYMENT SUCCESS
                            </span>
                        @else
                            <span class="w-fit text-sm font-bold py-2 px-3 rounded-full bg-orange-500 text-white">
                                PAYMENT PENDING
                            </span>
                        @endif
                        <!-- Travel Status -->
                        @php
                            $now = now();
                            $startDate = \Carbon\Carbon::parse($packageBooking->start_date);
                            $endDate = \Carbon\Carbon::parse($packageBooking->end_date);

                            if ($now->lt($startDate)) {
                                $travelStatus = 'Not Started';
                                $statusColor = 'bg-blue-500';
                            } elseif ($now->between($startDate, $endDate)) {
                                $travelStatus = 'Running';
                                $statusColor = 'bg-yellow-500';
                            } else {
                                $travelStatus = 'Completed';
                                $statusColor = 'bg-green-500';
                            }
                        @endphp
                        <span class="w-fit text-sm font-bold py-2 px-3 rounded-full {{ $statusColor }} text-white">
                            TRAVEL STATUS: {{ $travelStatus }}
                        </span>
                    </div>
                </div>

                <hr class="my-5">

                <!-- Customer Details -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div class="bg-gray-50 p-6 rounded-lg">
                        <h3 class="text-indigo-950 text-lg font-bold mb-4">Customer Details</h3>
                        <div class="flex flex-col gap-y-4">
                            <div class="flex flex-col">
                                <p class="text-slate-500 text-sm">Name</p>
                                <h3 class="text-indigo-950 text-xl font-bold">
                                    {{ $packageBooking->customer->name }}
                                </h3>
                            </div>
                            <div class="flex flex-col">
                                <p class="text-slate-500 text-sm">Email</p>
                                <h3 class="text-indigo-950 text-xl font-bold">
                                    {{ $packageBooking->customer->email }}
                                </h3>
                            </div>
                            <div class="flex flex-col">
                                <p class="text-slate-500 text-sm">Phone</p>
                                <h3 class="text-indigo-950 text-xl font-bold">
                                    {{ $packageBooking->customer->phone_number }}
                                </h3>
                            </div>
                        </div>
                    </div>

                    <!-- Booking Details -->
                    <div class="bg-gray-50 p-6 rounded-lg">
                        <h3 class="text-indigo-950 text-lg font-bold mb-4">Booking Details</h3>
                        <div class="flex flex-col gap-y-4">
                            <div class="flex flex-col">
                                <p class="text-slate-500 text-sm">Quantity</p>
                                <h3 class="text-indigo-950 text-xl font-bold">
                                    {{ $packageBooking->quantity }} people
                                </h3>
                            </div>
                            <div class="flex flex-col">
                                <p class="text-slate-500 text-sm">Total Days</p>
                                <h3 class="text-indigo-950 text-xl font-bold">
                                    {{ $packageBooking->tour->days }} days
                                </h3>
                            </div>
                            <div class="flex flex-col">
                                <p class="text-slate-500 text-sm">Date</p>
                                <h3 class="text-indigo-950 text-xl font-bold">
                                    {{ $packageBooking->start_date->format('M d, Y') }} - {{ $packageBooking->end_date->format('M d, Y') }}
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="my-5">

                <!-- Payment Details -->
                <div class="bg-gray-50 p-6 rounded-lg">
                    <h3 class="text-indigo-950 text-lg font-bold mb-4">Payment Details</h3>
                    <div class="flex flex-col gap-y-4">
                        <div class="flex flex-col">
                            <p class="text-slate-500 text-sm">Sub Total</p>
                            <h3 class="text-indigo-950 text-xl font-bold">
                                Rp {{ number_format($packageBooking->sub_total, 0, ',', '.') }}
                            </h3>
                        </div>
                        <div class="flex flex-col">
                            <p class="text-slate-500 text-sm">Insurance</p>
                            <h3 class="text-indigo-950 text-xl font-bold">
                                Rp {{ number_format($packageBooking->insurance, 0, ',', '.') }}
                            </h3>
                        </div>
                        <div class="flex flex-col">
                            <p class="text-slate-500 text-sm">Tax</p>
                            <h3 class="text-indigo-950 text-xl font-bold">
                                Rp {{ number_format($packageBooking->tax, 0, ',', '.') }}
                            </h3>
                        </div>
                        <div class="flex flex-col">
                            <p class="text-slate-500 text-sm">Total Amount</p>
                            <h3 class="text-indigo-950 text-xl font-bold">
                                Rp {{ number_format($packageBooking->total_amount, 0, ',', '.') }}
                            </h3>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>