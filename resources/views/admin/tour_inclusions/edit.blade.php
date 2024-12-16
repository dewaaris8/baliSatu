<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Tour Inclusion') }}
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
                <form method="POST" action="{{ route('admin.tour_inclusions.update', $tourInclusion->id) }}">
                    @csrf
                    @method('PATCH')

                    {{-- Package Tour --}}
                    <div class="mt-4">
                        <x-input-label for="package_tour_id" :value="__('Package Tour')" />
                        <select name="package_tour_id" id="package_tour_id" class="py-3 rounded-lg pl-3 w-full border border-slate-300">
                            <option value="{{ $tourInclusion->package_tour_id }}" selected>
                                {{ $tourInclusion->package_tour->name }}
                            </option>
                            @foreach ($packageTour as $tour)
                                <option value="{{ $tour->id }}" {{ $tourInclusion->package_tour_id == $tour->id ? 'selected' : '' }}>
                                    {{ $tour->name }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('package_tour_id')" class="mt-2" />
                    </div>

                    {{-- Type --}}
                    <div class="mt-4">
                        <x-input-label for="type" :value="__('Type')" />
                        <select name="type" id="type" class="py-3 rounded-lg pl-3 w-full border border-slate-300">
                            <option value="1" {{ $tourInclusion->type == 1 ? 'selected' : '' }}>Inclusion</option>
                            <option value="0" {{ $tourInclusion->type == 0 ? 'selected' : '' }}>Exclusion</option>
                        </select>
                        <x-input-error :messages="$errors->get('type')" class="mt-2" />
                    </div>

                    {{-- Description --}}
                    <div class="mt-4">
                        <x-input-label for="description" :value="__('Description')" />
                        <textarea name="description" id="description" rows="5" 
                            class="border border-slate-300 rounded-lg w-full px-3 py-2">{{ old('description', $tourInclusion->description) }}</textarea>
                        <x-input-error :messages="$errors->get('description')" class="mt-2" />
                    </div>

                    {{-- Submit Button --}}
                    <div class="flex items-center justify-end mt-4">
                        <x-primary-button>
                            {{ __('Update Inclusion') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
