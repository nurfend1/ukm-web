@extends('layouts.app')

@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Activity History') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="font-semibold text-lg mb-4">{{ __('Recent Activity') }}</h3>
                    <p>{{ __("Here is a list of your recent activities.") }}</p>
                    
                    <!-- Daftar Aktivitas -->
                    <ul class="list-disc pl-5 mt-4">
                        <li>Logged in on {{ now()->subDays(1)->format('M d, Y') }}</li>
                        <li>Updated profile on {{ now()->subDays(5)->format('M d, Y') }}</li>
                        <li>Changed password on {{ now()->subDays(10)->format('M d, Y') }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @endsection