@extends('layouts.app')

@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit UKM') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="font-semibold text-lg mb-4">{{ __('Update Your Profile') }}</h3>

                    <!-- Formulir Pembaruan Profil -->
                    <form action="{{ route('profile.update') }}" method="POST" class="space-y-6">
                        @csrf
                        <!-- Menyisipkan _method PUT -->
                        <input type="hidden" name="_method" value="PUT">
                        
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Name') }}</label>
                            <input type="text" name="name" id="name" class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-gray-300" value="{{ old('name', Auth::user()->name) }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Email') }}</label>
                            <input type="email" name="email" id="email" class="mt-1 block w-full border-gray-300 dark:border-gray-600 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-gray-300" value="{{ old('email', Auth::user()->email) }}" required>
                        </div>

            <!-- Tombol Save Changes dengan `!important` -->
<div class="flex justify-start">
    <button type="submit" class="px-4 py-2 bg-black text-white rounded-md hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-black focus:ring-offset-2" style="background-color: black !important;">
        {{ __('Save Changes') }}
    </button>
</div>  
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
