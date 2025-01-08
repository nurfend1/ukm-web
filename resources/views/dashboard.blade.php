@extends('layouts.app')

@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-lg font-medium leading-tight text-gray-900 dark:text-gray-100 mb-4">
                        Welcome, {{ auth()->user()->name }}!
                    </h3>
                    <p class="mb-4">{{ __("You're logged in as an admin.") }}</p>

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                        <!-- Menambahkan beberapa tombol atau bagian navigasi -->
                        <a href="{{ route('admin.users.index') }}" class="block text-center bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg">
                            Manage Users
                        </a>
                        <a href="{{ route('admin.ukms.index') }}" class="block text-center bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded-lg">
                            Manage UKM
                        </a>
                        <a href="{{ route('admin.kegiatan.index') }}" class="block text-center bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded-lg">
                            Manage Kegiatan
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
