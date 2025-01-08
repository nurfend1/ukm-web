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
                    <h3 class="font-semibold text-lg mb-6">{{ __('Managed UKMs') }}</h3>

                    <!-- Display UKMs List -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white dark:bg-gray-900 shadow rounded-lg">
                            <thead class="bg-gray-100 dark:bg-gray-700">
                                <tr>
                                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600 dark:text-gray-300 uppercase">{{ __('Logo') }}</th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600 dark:text-gray-300 uppercase">{{ __('Name') }}</th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600 dark:text-gray-300 uppercase">{{ __('Description') }}</th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600 dark:text-gray-300 uppercase">{{ __('Mission') }}</th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600 dark:text-gray-300 uppercase">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ukms as $ukm)
                                    <tr class="border-b border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                                            @if($ukm->logo_url)
                                                <img src="{{ asset('storage/' . $ukm->logo_url) }}" alt="{{ $ukm->name }}" class="w-10 h-10 object-cover rounded-full shadow">
                                            @else
                                                <span class="text-gray-500 dark:text-gray-400">{{ __('No Logo') }}</span>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 dark:text-gray-200">{{ $ukm->name }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-400">
                                            <!-- Description Pop-up -->
                                            @if(strlen($ukm->description) > 50)
                                                <button class="text-blue-600 hover:underline" data-modal-target="description-modal-{{ $ukm->id }}" data-modal-toggle="description-modal-{{ $ukm->id }}">
                                                    {{ substr($ukm->description, 0, 50) . '...' }}
                                                </button>
                                            @else
                                                {{ $ukm->description }}
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-400">
                                            <!-- Mission Pop-up -->
                                            @if(strlen($ukm->mission) > 50)
                                                <button class="text-blue-600 hover:underline" data-modal-target="mission-modal-{{ $ukm->id }}" data-modal-toggle="mission-modal-{{ $ukm->id }}">
                                                    {{ substr($ukm->mission, 0, 50) . '...' }}
                                                </button>
                                            @else
                                                {{ $ukm->mission }}
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-700 dark:text-gray-300">
                                            <!-- Edit Button -->
                                            <a href="{{ route('user.ukms.edit', $ukm->id) }}" class="text-green-600 hover:text-green-800">
                                                <i class="fas fa-edit text-xl mr-2"></i>{{ __('Edit') }}
                                            </a>
                                        </td>
                                    </tr>
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
