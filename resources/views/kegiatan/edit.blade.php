@extends('layouts.app')

@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Activity') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Form to edit an existing activity -->
                    <form action="{{ route('kegiatan.update', $kegiatan->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <!-- Activity Title -->
                        <div class="mb-4">
                            <label for="title" class="block text-gray-700">{{ __('Activity Title') }}</label>
                            <input type="text" name="title" id="title" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('title') border-red-500 @enderror" value="{{ old('title', $kegiatan->title) }}" required>
                            @error('title')
                                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Activity Description -->
                        <div class="mb-4">
                            <label for="description" class="block text-gray-700">{{ __('Activity Description') }}</label>
                            <textarea name="description" id="description" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('description') border-red-500 @enderror" required>{{ old('description', $kegiatan->description) }}</textarea>
                            @error('description')
                                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Start Date -->
                        <div class="mb-4">
                            <label for="start_date" class="block text-gray-700">{{ __('Start Date') }}</label>
                            <input type="date" name="start_date" id="start_date" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('start_date') border-red-500 @enderror" value="{{ old('start_date', $kegiatan->start_date) }}" required>
                            @error('start_date')
                                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- End Date -->
                        <div class="mb-4">
                            <label for="end_date" class="block text-gray-700">{{ __('End Date') }}</label>
                            <input type="date" name="end_date" id="end_date" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 @error('end_date') border-red-500 @enderror" value="{{ old('end_date', $kegiatan->end_date) }}" required>
                            @error('end_date')
                                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- UKM Selection -->
                        <div class="mb-4">
                            <label for="ukm_id" class="block text-gray-700">{{ __('Select UKM') }}</label>
                            <select name="ukm_id" id="ukm_id" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                                @foreach($ukms as $ukm)
                                    <option value="{{ $ukm->id }}" {{ $ukm->id == $kegiatan->ukm_id ? 'selected' : '' }}>{{ $ukm->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                        

                        <!-- Image Upload -->
                        <div class="mb-4">
                            <label for="image" class="block text-gray-700">{{ __('Activity Image') }}</label>
                            <input type="file" name="image" id="image" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" accept="image/*">
                            
                            @if ($kegiatan->image)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $kegiatan->image) }}" alt="Current Activity Image" class="w-32 h-32 object-cover rounded-md">
                                    <p class="mt-1 text-sm text-gray-500">{{ __('Current Image') }}</p>
                                </div>
                            @endif
                        </div>

                        <!-- Submit Button -->
                        <div class="mt-6 flex justify-end">
                            <button type="submit" class="bg-blue-600 text-white px-6 py-3 rounded-md shadow-md hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                                {{ __('Save Changes') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
