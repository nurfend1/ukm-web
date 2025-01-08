@extends('layouts.app')

@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add New UKM') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="font-semibold text-lg mb-4">{{ __('Create a New UKM') }}</h3>

                    <form action="{{ route('admin.storeUkm') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">{{ __('UKM Name') }}</label>
                            <input type="text" name="name" id="name" class="mt-1 block w-full" required>
                        </div>

                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-700">{{ __('Description') }}</label>
                            <textarea name="description" id="description" class="mt-1 block w-full"></textarea>
                        </div>

                        <div class="mb-4">
                            <label for="logo_url" class="block text-sm font-medium text-gray-700">{{ __('Logo URL') }}</label>
                            <input type="text" name="logo_url" id="logo_url" class="mt-1 block w-full">
                        </div>

                        <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded">{{ __('Save UKM') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
