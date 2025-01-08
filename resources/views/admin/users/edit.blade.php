@extends('layouts.app')

@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form action="{{ route('admin.users.edit', $user->id) }}" method="POST">
                        @csrf
                        @method('PUT') <!-- Menentukan metode PUT untuk update data -->
                        <div class="mb-4">
                            <label for="name" class="block font-medium">{{ __('Name') }}</label>
                            <input type="text" id="name" name="name" value="{{ $user->name }}" class="w-full mt-2 p-2 border rounded">
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block font-medium">{{ __('Email') }}</label>
                            <input type="email" id="email" name="email" value="{{ $user->email }}" class="w-full mt-2 p-2 border rounded">
                        </div>

                        <div class="mb-4">
                            <label for="role" class="block font-medium">{{ __('Role') }}</label>
                            <select id="role" name="role" class="w-full mt-2 p-2 border rounded">
                                <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>{{ __('User') }}</option>
                                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>{{ __('Admin') }}</option>
                            </select>
                        </div>

                        <x-primary-button type="submit">{{ __('Update User') }}</x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection
