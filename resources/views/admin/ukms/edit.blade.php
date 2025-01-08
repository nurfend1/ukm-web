@extends('layouts.app')

@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('UKM Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg">
                <div class="p-8 text-gray-900 dark:text-gray-100">
                    <h3 class="text-2xl font-semibold text-gray-800 dark:text-gray-200 mb-6">{{ __('Edit UKM') }}</h3>

                    <form method="POST" action="{{ route('admin.ukms.update', $ukm->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- UKM Name Field -->
                        <div class="mb-6">
                            <label for="name" class="block text-gray-700 dark:text-gray-300 text-lg">{{ __('UKM Name') }}</label>
                            <input type="text" name="name" id="name" class="form-input mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('name', $ukm->name) }}" required>
                            @error('name')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- UKM Description Field -->
                        <div class="mb-6">
                            <label for="description" class="block text-gray-700 dark:text-gray-300 text-lg">{{ __('Description') }}</label>
                            <textarea name="description" id="description" rows="4" class="form-textarea mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description', $ukm->description) }}</textarea>
                            @error('description')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Mission Field -->
                        <div class="mb-6">
                            <label for="mission" class="block text-gray-700 dark:text-gray-300 text-lg">{{ __('Mission') }}</label>
                            <textarea name="mission" id="mission" rows="4" class="form-textarea mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('mission', $ukm->mission) }}</textarea>
                            @error('mission')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- UKM Logo Field -->
                        <div class="mb-6">
                            <label for="logo" class="block text-gray-700 dark:text-gray-300 text-lg">{{ __('UKM Logo') }}</label>
                            <input type="file" name="logo" id="logo" class="form-input mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" accept="image/*">
                            @error('logo')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror

                            @if($ukm->logo)
                                <div class="mt-4">
                                    <img src="{{ Storage::url($ukm->logo) }}" alt="Current UKM Logo" class="w-32 h-32 object-cover rounded-md shadow-md">
                                    <p class="text-gray-500 text-sm mt-2">{{ __('Current logo') }}</p>
                                </div>
                            @else
                                <p class="text-gray-500 text-sm mt-2">{{ __('No logo uploaded yet') }}</p>
                            @endif
                        </div>

                        <!-- Managed Users -->
                        <div class="mb-6">
                            <label for="managed_users" class="block text-gray-700 dark:text-gray-300 text-lg">{{ __('Managed Users') }}</label>
                            <select name="managed_users[]" id="managed_users" class="form-select mt-2 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" multiple>
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}" {{ in_array($user->id, $ukm->managers->pluck('id')->toArray()) ? 'selected' : '' }}>
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('managed_users')
                                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                            @enderror
                            <p class="text-gray-500 text-sm mt-2">{{ __('Select users who will manage this UKM') }}</p>
                        </div>

                        <!-- Submit Button -->
                        <div class="flex items-center justify-start mt-8">
                            <button type="submit" class="px-6 py-3 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                {{ __('Update UKM') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
