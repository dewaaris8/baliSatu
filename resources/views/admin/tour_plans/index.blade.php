<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Manage Tours') }}
            </h2>
            <a href="{{ route('admin.tour_plans.create') }}" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                Add New
            </a>
        </div>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8 flex flex-col gap-y-8">

                @forelse ($tourPlans as $plan)
                <div class="item-card p-6 rounded-lg bg-gray-50 shadow grid grid-cols-12 gap-6 items-start">
                    <!-- Thumbnail -->
                    <div class="col-span-3">
                        <img src="{{Storage::url($plan->package_tour->thumbnail)}}" alt="" class="rounded-lg object-cover w-full h-24">
                    </div>

                    <!-- Tour Info -->
                    <div class="col-span-3">
                        <h3 class="text-indigo-950 text-lg font-bold">{{ $plan->package_tour->name }}</h3>
                        <p class="text-slate-500 text-sm">Package Tour ID: {{ $plan->package_tour->id }}</p>
                    </div>

                    <!-- Day Info -->
                    <div class="col-span-2">
                        <p class="text-slate-500 text-sm">Day</p>
                        <h3 class="text-indigo-950 text-lg font-semibold">Plan for Day {{ $plan->day }}</h3>
                    </div>

                    <!-- Description -->
                    <div class="col-span-4">
                        <p class="text-slate-500 text-sm">Description</p>
                        <p class="text-indigo-950 text-base font-medium">
                            {{ $plan->description }}
                        </p>
                    </div>

                    <!-- Actions -->
                    <div class="col-span-12 flex flex-row gap-x-3 mt-4 md:mt-0">
                        <a href="{{ route('admin.tour_plans.edit', $plan) }}" class="font-bold py-2 px-4 bg-indigo-700 text-white rounded-full">
                            Edit
                        </a>
                        <form method="POST" action="{{ route('admin.tour_plans.destroy', $plan->id) }}" onsubmit="return confirm('Are you sure you want to delete this item?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="font-bold py-2 px-4 bg-red-700 text-white rounded-full">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
                @empty
                <p class="text-gray-500 text-center">No plans found</p>
                @endforelse

                <!-- Pagination Links -->
                <div class="mt-4">
                    {{ $tourPlans->links() }}
                </div>
                
            </div>
        </div>
    </div>
</x-app-layout>
