<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Manage Bookings') }}
            </h2>
        </div>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Filter Form -->
            <div class="mb-6">
                <form method="GET" action="{{ route('admin.package_bookings.index') }}" class="flex gap-x-3 items-center">
                    <select name="month" class="border border-gray-300 rounded-md px-3 py-2">
                        <option value="">Select Month</option>
                        @foreach(range(1, 12) as $month)
                            <option value="{{ $month }}" {{ request('month') == $month ? 'selected' : '' }}>
                                {{ \Carbon\Carbon::create()->month($month)->format('F') }}
                            </option>
                        @endforeach
                    </select>
                    
                    <select name="year" class="border border-gray-300 rounded-md px-3 py-2">
                        <option value="">Select Year</option>
                        @foreach(range(date('Y'), 1900) as $year)
                            <option value="{{ $year }}" {{ request('year') == $year ? 'selected' : '' }}>
                                {{ $year }}
                            </option>
                        @endforeach
                    </select>

                    <button type="submit" class="bg-indigo-700 text-white px-4 py-2 rounded-md">
                        Filter
                    </button>
                    <a href="{{ route('admin.package_bookings.index') }}" class="bg-gray-300 text-black px-4 py-2 rounded-md">
                        Clear Filter
                    </a>
                </form>
            </div>

            <!-- Bookings List -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10 flex flex-col gap-y-5">
                @forelse ($package_bookings as $booking)
                <div class="item-card flex flex-row justify-between items-center">
                    <div class="flex flex-row items-center gap-x-3">
                        <img src="{{ Storage::url($booking->tour->thumbnail) }}" 
                             alt="{{ $booking->tour->name }}" 
                             class="rounded-2xl object-cover w-[120px] h-[90px]">
                        <div class="flex flex-col">
                            <h3 class="text-indigo-950 text-xl font-bold">{{ $booking->tour->name }}</h3>
                            <p class="text-slate-500 text-sm">{{ $booking->tour->category->name }}</p>
                        </div>
                    </div> 

                    <!-- Status -->
                    <span class="w-fit text-sm font-bold py-2 px-3 rounded-full bg-green-500 text-white">
                        SUCCESS
                    </span>

                    <!-- Additional Details -->
                    <div class="hidden md:flex flex-col">
                        <p class="text-slate-500 text-sm">Price</p>
                        <h3 class="text-indigo-950 text-xl font-bold">
                            Rp {{ number_format($booking->tour->price, 0, ',', '.') }}
                        </h3>
                    </div>
                    <div class="hidden md:flex flex-col">
                        <p class="text-slate-500 text-sm">Total Days</p>
                        <h3 class="text-indigo-950 text-xl font-bold">{{ $booking->tour->days }} Days</h3>
                    </div>
                    <div class="hidden md:flex flex-col">
                        <p class="text-slate-500 text-sm">Quantity</p>
                        <h3 class="text-indigo-950 text-xl font-bold">{{ $booking->quantity }} People</h3>
                    </div>
                    <div class="hidden md:flex flex-row items-center gap-x-3">
                        <a href="{{ route('admin.package_bookings.show', $booking) }}" 
                           class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                            Details
                        </a>
                    </div>
                </div>
                @empty
                <p class="text-gray-500">No bookings found</p>
                @endforelse

                <!-- Pagination -->
                <div class="mt-6">
                    {{ $package_bookings->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
