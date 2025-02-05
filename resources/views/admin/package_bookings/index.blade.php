<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Booking Report') }}
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

            <!-- Report Summary -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 mb-6">
                <h3 class="text-lg font-semibold mb-4">Report Summary</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="bg-gray-100 p-4 rounded-lg">
                        <p class="text-sm text-gray-600">Total Bookings</p>
                        <p class="text-xl font-bold">{{ $package_bookings->total() }}</p>
                    </div>
                    <div class="bg-gray-100 p-4 rounded-lg">
                        <p class="text-sm text-gray-600">Total Revenue</p>
                        <p class="text-xl font-bold">Rp {{ number_format($package_bookings->sum('total_amount'), 0, ',', '.') }}</p>
                    </div>
                    <div class="bg-gray-100 p-4 rounded-lg">
                        <p class="text-sm text-gray-600">Average Booking Value</p>
                        <p class="text-xl font-bold">Rp {{ number_format($package_bookings->avg('total_amount'), 0, ',', '.') }}</p>
                    </div>
                </div>
            </div>

            <!-- Bookings Table -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold mb-4">Bookings List</h3>
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Tour Name
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Category
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Price
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Days
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Order Date
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($package_bookings as $booking)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <img src="{{ Storage::url($booking->tour->thumbnail) }}" 
                                         alt="{{ $booking->tour->name }}" 
                                         class="rounded-2xl object-cover w-[60px] h-[45px] mr-3">
                                    <div class="text-sm font-medium text-gray-900">
                                        {{ $booking->tour->name }}
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $booking->tour->category->name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                Rp {{ number_format($booking->total_amount, 0, ',', '.') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $booking->tour->days }} Days
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                {{ $booking->created_at->format('M d, Y') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-2 py-1 text-sm font-bold rounded-full bg-green-500 text-white">
                                    SUCCESS
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <a href="{{ route('admin.package_bookings.show', $booking) }}" 
                                   class="text-indigo-600 hover:text-indigo-900">
                                    Details
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                                No bookings found
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

                <!-- Pagination -->
                <div class="mt-6">
                    {{ $package_bookings->links() }}
                </div>
            </div>

            <!-- Export Options -->
            {{-- <div class="mt-6 flex justify-end gap-x-3">
                <a href="#" class="bg-green-500 text-white px-4 py-2 rounded-md">
                    Export as PDF
                </a>
                <a href="#" class="bg-blue-500 text-white px-4 py-2 rounded-md">
                    Export as Excel
                </a>
                <a href="#" class="bg-gray-500 text-white px-4 py-2 rounded-md">
                    Export as CSV
                </a>
            </div> --}}
        </div>
    </div>
</x-app-layout>