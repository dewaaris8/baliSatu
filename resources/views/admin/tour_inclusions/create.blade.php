<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Tour Inclusion') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden p-10 shadow-sm sm:rounded-lg">

                {{-- Display validation errors --}}
                @if ($errors->any())
                    <div class="mb-4">
                        <div class="font-medium text-red-600">{{ __('Whoops! Something went wrong.') }}</div>
                        <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                {{-- Tour Inclusion Form --}}
                <form method="POST" action="{{ route('admin.tour_inclusions.store') }}" enctype="multipart/form-data">
                    @csrf

                    {{-- Inclusion or Exclusion --}}
                    <div class="mt-4">
                        <x-input-label for="type" :value="__('Type')" />
                        <select name="package_tour_id" id="package_tour_id" class="py-3 rounded-lg pl-3 w-full border border-slate-300">
                            <option value="">Choose Package Tour</option>
                            @foreach ($packageTour as $tour) 
                            <option value="{{$tour->id}}">{{$tour->name}}</option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('type')" class="mt-2" />
                    </div>

                    <div class="mt-4">
                        <x-input-label for="type" :value="__('Type')" />
                        <select name="type" id="type" class="py-3 rounded-lg pl-3 w-full border border-slate-300">
                            <option value="">Choose Type</option>
                            <option value="1">Inclusion</option>
                            <option value="0">Exclusion</option>
                        </select>
                        <x-input-error :messages="$errors->get('type')" class="mt-2" />
                    </div>

                    {{-- Description --}}
                    <div class="mt-4">
                        <x-input-label for="description" :value="__('Description')" />
                        <textarea name="description" id="description" rows="5" 
                            class="border border-slate-300 rounded-lg w-full px-3 py-2"
                            placeholder="Write the inclusion or exclusion description here..."></textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>

                    {{-- Submit Button --}}
                    <div class="flex items-center justify-end mt-4">
                        <x-primary-button>
                            {{ __('Add Inclusion') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
