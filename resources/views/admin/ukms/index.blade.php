@extends('layouts.app')

@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('UKM Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="font-semibold text-lg mb-6">{{ __('Manage UKMs') }}</h3>

                    <!-- Display UKMs List -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white dark:bg-gray-900 shadow rounded-lg">
                            <thead class="bg-gray-100 dark:bg-gray-700">
                                <tr>
                                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600 dark:text-gray-300 uppercase">{{ __('Logo') }}</th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600 dark:text-gray-300 uppercase">{{ __('ID') }}</th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600 dark:text-gray-300 uppercase">{{ __('Name') }}</th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600 dark:text-gray-300 uppercase">{{ __('Description') }}</th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600 dark:text-gray-300 uppercase">{{ __('Mission') }}</th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600 dark:text-gray-300 uppercase">{{ __('Manager') }}</th>
                                    <th class="px-6 py-3 text-center text-sm font-semibold text-gray-600 dark:text-gray-300 uppercase">{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ukms as $ukm)
                                    <tr class="border-b border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">
                                        <!-- Logo Column -->
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                                            @if($ukm->logo_url)
                                                <button class="focus:outline-none" data-modal-target="logo-modal-{{ $ukm->id }}" data-modal-toggle="logo-modal-{{ $ukm->id }}">
                                                    <img src="{{ Storage::url($ukm->logo_url) }}" alt="{{ $ukm->name }}" class="w-10 h-10 object-cover rounded-full shadow cursor-pointer">
                                                </button>
                                            @else
                                                <span class="text-gray-500 dark:text-gray-400">{{ __('No Logo') }}</span>
                                            @endif
                                        </td>
                                        <!-- Other Columns -->
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-gray-300">{{ $ukm->id }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-200">{{ $ukm->name }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-400">
                                            @if(strlen($ukm->description) > 50)
                                                <button class="text-blue-600 hover:underline" data-modal-target="description-modal-{{ $ukm->id }}" data-modal-toggle="description-modal-{{ $ukm->id }}">
                                                    {{ substr($ukm->description, 0, 50) . '...' }}
                                                </button>
                                            @else
                                                {{ $ukm->description }}
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-400">
                                            @if(strlen($ukm->mission) > 50)
                                                <button class="text-blue-600 hover:underline" data-modal-target="mission-modal-{{ $ukm->id }}" data-modal-toggle="mission-modal-{{ $ukm->id }}">
                                                    {{ substr($ukm->mission, 0, 50) . '...' }}
                                                </button>
                                            @else
                                                {{ $ukm->mission }}
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-700 dark:text-gray-300">
                                            @if($ukm->managers->isNotEmpty())
                                                @foreach($ukm->managers as $manager)
                                                <span class="text-red-500">{{ $manager->name }}</span><br>
                                                @endforeach
                                            @else
                                                <span class="text-gray-400">{{ __('No Manager') }}</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 text-center text-sm space-x-2 flex justify-center items-center">
                                            <a href="{{ route('admin.ukms.edit', $ukm->id) }}" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition duration-150">
                                                {{ __('Edit') }}
                                            </a>
                                            <form action="{{ route('admin.ukms.destroy', $ukm->id) }}" method="POST" class="inline ml-2">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 transition duration-150">
                                                    {{ __('Delete') }}
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    <!-- Modal for Logo -->
                                    <div id="logo-modal-{{ $ukm->id }}" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center hidden">
                                        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg max-w-lg w-full">
                                            <h3 class="font-semibold text-xl mb-4">{{ __('Logo') }}</h3>
                                            <div class="flex justify-center">
                                                <img src="{{ Storage::url($ukm->logo_url) }}" alt="{{ $ukm->name }}" class="max-w-full h-auto rounded shadow">
                                            </div>
                                            <button class="mt-4 text-red-600 hover:underline close-modal" data-modal-target="logo-modal-{{ $ukm->id }}">
                                                {{ __('Close') }}
                                            </button>
                                        </div>
                                    </div>
                                    <!-- Modal for Description -->
                                    <div id="description-modal-{{ $ukm->id }}" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center hidden">
                                        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg max-w-3xl w-full">
                                            <h3 class="font-semibold text-xl mb-4">{{ __('Description') }}</h3>
                                            <p class="text-gray-700 dark:text-gray-300">{{ $ukm->description }}</p>
                                            <button class="mt-4 text-red-600 hover:underline close-modal" data-modal-target="description-modal-{{ $ukm->id }}">
                                                {{ __('Close') }}
                                            </button>
                                        </div>
                                    </div>
                                    <!-- Modal for Mission -->
                                    <div id="mission-modal-{{ $ukm->id }}" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center hidden">
                                        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg max-w-3xl w-full">
                                            <h3 class="font-semibold text-xl mb-4">{{ __('Mission') }}</h3>
                                            <p class="text-gray-700 dark:text-gray-300">{{ $ukm->mission }}</p>
                                            <button class="mt-4 text-red-600 hover:underline close-modal" data-modal-target="mission-modal-{{ $ukm->id }}">
                                                {{ __('Close') }}
                                            </button>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Add New UKM Button -->
                    <div class="mt-6">
                        <a href="{{ route('admin.ukms.create') }}" class="bg-blue-600 text-white px-5 py-3 rounded-md shadow-md hover:bg-blue-700 transition duration-150">
                            {{ __('Add New UKM') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Toggle Script -->
    <script>
        // Toggle the modal visibility when clicking on the button
        const modalToggles = document.querySelectorAll('[data-modal-toggle]');
        modalToggles.forEach(toggle => {
            toggle.addEventListener('click', () => {
                const target = document.getElementById(toggle.getAttribute('data-modal-target'));
                target.classList.toggle('hidden');
            });
        });

        // Close the modal when clicking on the close button
        const closeButtons = document.querySelectorAll('.close-modal');
        closeButtons.forEach(button => {
            button.addEventListener('click', () => {
                const target = document.getElementById(button.getAttribute('data-modal-target'));
                target.classList.add('hidden');
            });
        });
    </script>
@endsection
