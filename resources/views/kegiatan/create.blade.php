@extends('layouts.app')

@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create New Activity') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Form to create a new activity -->
                    <form action="{{ route('kegiatan.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <!-- Activity Title -->
                        <div class="mb-4">
                            <label for="title" class="block text-gray-700">{{ __('Activity Title') }}</label>
                            <input type="text" name="title" id="title" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" required>
                        </div>

                        <!-- Activity Description -->
                        <div class="mb-4">
                            <label for="description" class="block text-gray-700">{{ __('Activity Description') }}</label>
                            <textarea name="description" id="description" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" required></textarea>
                        </div>

                        <!-- Start Date -->
                        <div class="mb-4">
                            <label for="start_date" class="block text-gray-700">{{ __('Start Date') }}</label>
                            <input type="date" name="start_date" id="start_date" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" required>
                        </div>

                        <!-- End Date -->
                        <div class="mb-4">
                            <label for="end_date" class="block text-gray-700">{{ __('End Date') }}</label>
                            <input type="date" name="end_date" id="end_date" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" required>
                        </div>

                        <!-- UKM Selection -->
                        <div class="mb-4">
                            <label for="ukm_id" class="block text-gray-700">{{ __('Select UKM') }}</label>
                            <select name="ukm_id" id="ukm_id" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" required>
                                @foreach($ukms as $ukm)
                                    <option value="{{ $ukm->id }}">{{ $ukm->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Image Upload -->
                        <div class="mb-4">
                            <label for="image" class="block text-gray-700">{{ __('Activity Image') }}</label>
                            <input type="file" name="image" id="image" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm" accept="image/*">
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md shadow-md hover:bg-blue-700 transition duration-150">
                            {{ __('Save Activity') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
