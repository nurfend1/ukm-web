@extends('layouts.app')

@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Welcome Animation -->
            <div class="mb-10 text-center">
                <h1 class="text-4xl font-bold text-gray-800 dark:text-gray-200 animate-bounce">{{ __('Welcome, Admin!') }}</h1>
                <p class="mt-2 text-lg">{{ __('Manage your application and its components below.') }}</p>
            </div>

            <!-- Dashboard Info Section -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-10">
                <div class="bg-blue-500 text-white shadow-md rounded-lg p-6">
                    <h3 class="text-lg font-bold">{{ __('Total Users') }}</h3>
                    <p class="text-4xl mt-2">{{ $totalUsers }}</p>
                </div>
                <div class="bg-green-500 text-white shadow-md rounded-lg p-6">
                    <h3 class="text-lg font-bold">{{ __('Total UKMs') }}</h3>
                    <p class="text-4xl mt-2">{{ $totalUkms }}</p>
                </div>
                <div class="bg-yellow-500 text-white shadow-md rounded-lg p-6">
                    <h3 class="text-lg font-bold">{{ __('Total Kegiatan') }}</h3>
                    <p class="text-4xl mt-2">{{ $totalKegiatan }}</p>
                </div>
            </div>

            <!-- Management Sections -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- User Management Card -->
                <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
                    <h3 class="font-bold text-lg text-gray-800 dark:text-gray-200 mb-4">{{ __('User Management') }}</h3>
                    <ul class="space-y-4">
                        <li>
                            <a href="{{ route('admin.users.index') }}" class="flex items-center text-blue-600 hover:text-blue-800 transition-transform transform hover:scale-105">
                                <i class="fas fa-users text-xl mr-2"></i>
                                <span>{{ __('View Users') }}</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.users.create') }}" class="flex items-center text-blue-600 hover:text-blue-800 transition-transform transform hover:scale-105">
                                <i class="fas fa-user-plus text-xl mr-2"></i>
                                <span>{{ __('Add New User') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- UKM Management Card -->
                <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
                    <h3 class="font-bold text-lg text-gray-800 dark:text-gray-200 mb-4">{{ __('UKM Management') }}</h3>
                    <ul class="space-y-4">
                        <li>
                            <a href="{{ route('admin.ukms.index') }}" class="flex items-center text-green-600 hover:text-green-800 transition-transform transform hover:scale-105">
                                <i class="fas fa-building text-xl mr-2"></i>
                                <span>{{ __('View UKMs') }}</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.ukms.create') }}" class="flex items-center text-green-600 hover:text-green-800 transition-transform transform hover:scale-105">
                                <i class="fas fa-plus-circle text-xl mr-2"></i>
                                <span>{{ __('Add New UKM') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- Kegiatan Management Card -->
                <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
                    <h3 class="font-bold text-lg text-gray-800 dark:text-gray-200 mb-4">{{ __('Kegiatan Management') }}</h3>
                    <ul class="space-y-4">
                        <li>
                            <a href="{{ route('kegiatan.create') }}" class="flex items-center text-yellow-600 hover:text-yellow-800 transition-transform transform hover:scale-105">
                                <i class="fas fa-plus-circle text-xl mr-2"></i>
                                <span>{{ __('Add New Kegiatan') }}</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('kegiatan.index') }}" class="flex items-center text-yellow-600 hover:text-yellow-800 transition-transform transform hover:scale-105">
                                <i class="fas fa-list-alt text-xl mr-2"></i>
                                <span>{{ __('View Kegiatan') }}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Logout Button -->
            <div class="mt-8 flex justify-center">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="px-6 py-2 bg-red-600 text-white font-semibold rounded-lg shadow hover:bg-red-700 transition-transform transform hover:scale-105 focus:outline-none">
                        {{ __('Logout') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
