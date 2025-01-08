<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-row justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Details Tours') }}
            </h2>
        </div>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10 flex flex-col gap-y-5">
    
                <!-- Package Tour Information -->
                <div class="item-card flex flex-row justify-between items-center">
                    <div class="flex flex-row items-center gap-x-3">
                        <img src="{{ Storage::url($packageTour->thumbnail) }}" alt="" class="rounded-2xl object-cover w-[120px] h-[90px]">
                        <div class="flex flex-col">
                            <h3 class="text-indigo-950 text-xl font-bold">{{ $packageTour->name }}</h3>
                            <p class="text-slate-500 text-sm">{{ $packageTour->category->name }}</p>
                        </div>
                    </div>
                    <div class="hidden md:flex flex-col">
                        <p class="text-slate-500 text-sm">Price</p>
                        <h3 class="text-indigo-950 text-xl font-bold">Rp. {{ number_format($packageTour->price, 0, ',', '.') }}</h3>
                    </div>
                    <div class="hidden md:flex flex-col">
                        <p class="text-slate-500 text-sm">Total Days</p>
                        <h3 class="text-indigo-950 text-xl font-bold">{{ $packageTour->days }} Days</h3>
                    </div>
                    <div class="hidden md:flex flex-row items-center gap-x-3">
                        <a href="{{ Route('admin.package_tours.edit', $packageTour) }}" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">Edit</a>
                        <a href="{{ Route('admin.tour_inclusions.create', $packageTour) }}" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">Add Inclusion or Exclusion</a>
                        <form action="{{ Route('admin.package_tours.destroy', $packageTour) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="font-bold py-4 px-6 bg-red-700 text-white rounded-full">Delete</button>
                        </form>
                    </div>
                </div>
    
                <hr class="my-5">
    
                <!-- Gallery Photos -->
                <h3 class="text-indigo-950 text-xl font-bold">Gallery Photos</h3>
                <div class="flex flex-row gap-x-5">
                    @forelse ($latestPhotos as $photo)
                        <img src="{{ Storage::url($photo->photo) }}" alt="" class="rounded-2xl object-cover w-[120px] h-[90px]">
                    @empty
                        <p class="text-slate-500 text-sm">No Photos</p>
                    @endforelse
                </div>
    
                <!-- Tour Inclusions -->
                <div>
                    <h3 class="text-indigo-950 text-xl font-bold">Tour Inclusions</h3>
                    <ul class="list-disc pl-5">
                        @forelse ($tour_inclusions as $inclusion)
                            <li class="text-slate-700 text-sm">{{ $inclusion->description }}</li>
                        @empty
                            <p class="text-slate-500 text-sm">No inclusions</p>
                        @endforelse
                    </ul>
                </div>

                <div>
                    <h3 class="text-indigo-950 text-xl font-bold">Tour Plans</h3>
                    <ul class="list-decimal pl-5">
                        @forelse ($tour_plans as $plan)
                            <li class="text-slate-700 text-sm">
                                <span class="font-bold"></span> {{ $plan->description }}
                            </li>
                        @empty
                            <p class="text-slate-500 text-sm">No tour plans available.</p>
                        @endforelse
                    </ul>
                </div>
    
                <!-- About Section -->
                <div>
                    <h3 class="text-indigo-950 text-xl font-bold">About</h3>
                    <p class="text-slate-700 text-sm">{{ $packageTour->about }}</p>
                </div>
    
            </div>
        </div>
    </div>
    
</x-app-layout>
