@extends('layouts.app')

@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('UKM Management') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="font-semibold text-lg mb-4">{{ __('Create New UKM') }}</h3>
                    <form method="POST" action="{{ route('admin.ukms.store') }}" enctype="multipart/form-data">
                        @csrf
                        <!-- UKM Name Field -->
                        <div class="mb-4">
                            <label for="name" class="block text-gray-700">{{ __('UKM Name') }}</label>
                            <input type="text" name="name" id="name" class="form-input mt-1 block w-full" value="{{ old('name') }}" required>
                            @error('name') 
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p> 
                            @enderror
                        </div>

                        <!-- UKM Description Field -->
                        <div class="mb-4">
                            <label for="description" class="block text-gray-700">{{ __('Description') }}</label>
                            <textarea name="description" id="description" rows="4" class="form-textarea mt-1 block w-full">{{ old('description') }}</textarea>
                            @error('description') 
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p> 
                            @enderror
                        </div>

                        <!-- UKM Mission Field -->
                        <div class="mb-6">
                            <label for="mission" class="block text-gray-700">{{ __('Mission') }}</label>
                            <textarea name="mission" id="mission" rows="4" class="form-textarea mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('mission') }}</textarea>
                            @error('mission')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <!-- UKM Logo Field -->
                        <div class="mb-4">
                            <label for="logo" class="block text-gray-700">{{ __('UKM Logo') }}</label>
                            <input type="file" name="logo" id="logo" class="form-input mt-1 block w-full" accept="image/*">
                            @error('logo') 
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p> 
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="flex items-center justify-start mt-6">
                            <x-primary-button>{{ __('Create UKM') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
