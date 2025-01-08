@extends('layouts.app')

@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Kegiatan Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-md sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="font-semibold text-lg mb-6">{{ __('Manage Kegiatan') }}</h3>

                    <!-- Daftar Kegiatan -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white dark:bg-gray-900 shadow rounded-lg">
                            <thead class="bg-gray-100 dark:bg-gray-700">
                                <tr>
                                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600 dark:text-gray-300 uppercase">{{ __('UKM') }}</th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600 dark:text-gray-300 uppercase">{{ __('Kegiatan') }}</th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600 dark:text-gray-300 uppercase">{{ __('Deskripsi') }}</th>
                                    <th class="px-6 py-3 text-left text-sm font-semibold text-gray-600 dark:text-gray-300 uppercase">{{ __('Tanggal Kegiatan') }}</th>
                                    <th class="px-6 py-3 text-center text-sm font-semibold text-gray-600 dark:text-gray-300 uppercase">{{ __('Dokumentasi') }}</th>
                                    <th class="px-6 py-3 text-center text-sm font-semibold text-gray-600 dark:text-gray-300 uppercase w-1/6">{{ __('Actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($kegiatans as $kegiatan)
                                    <tr class="border-b border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">
                                        <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-200">{{ $kegiatan->ukm->name }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-200">{{ $kegiatan->title }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-600 dark:text-gray-400">
                                            @if(strlen($kegiatan->description) > 50)
                                                <button class="text-blue-600 hover:underline" data-modal-target="description-modal-{{ $kegiatan->id }}" data-modal-toggle="description-modal-{{ $kegiatan->id }}">
                                                    {{ substr($kegiatan->description, 0, 50) . '...' }}
                                                </button>
                                            @else
                                                {{ $kegiatan->description }}
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-900 dark:text-gray-200">{{ $kegiatan->start_date }} - {{ $kegiatan->end_date }}</td>
                                        <td class="px-6 py-4 text-center text-sm text-gray-900 dark:text-gray-200">
                                            @if($kegiatan->image)
                                                <img 
                                                    src="{{ asset('storage/' . $kegiatan->image) }}" 
                                                    alt="Thumbnail" 
                                                    class="w-16 h-16 object-cover rounded-md cursor-pointer"
                                                    onclick="openModal('{{ asset('storage/' . $kegiatan->image) }}')">
                                            @else
                                                {{ __('No Image') }}
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 text-center text-sm text-gray-900 dark:text-gray-200">
                                            <a href="{{ route('kegiatan.edit', $kegiatan->id) }}" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition duration-150 text-xs">
                                                {{ __('Edit') }}
                                            </a>
                                            <form action="{{ route('kegiatan.destroy', $kegiatan->id) }}" method="POST" class="inline ml-2">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 transition duration-150 text-xs">
                                                    {{ __('Delete') }}
                                                </button>
                                            </form>
                                        </td>
                                    </tr>

                                    <!-- Modal for the full description -->
                                    <div id="description-modal-{{ $kegiatan->id }}" class="fixed inset-0 bg-gray-800 bg-opacity-50 flex items-center justify-center hidden">
                                        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg max-w-3xl w-full">
                                            <h3 class="font-semibold text-xl mb-4">{{ __('Description') }}</h3>
                                            <p class="text-gray-700 dark:text-gray-300">{{ $kegiatan->description }}</p>
                                            <button onclick="closeModal()" class="mt-4 text-red-600 hover:underline close-modal" data-modal-target="description-modal-{{ $kegiatan->id }}">
                                                {{ __('Close') }}
                                            </button>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-6">
                        <a href="{{ route('kegiatan.create') }}" class="bg-blue-600 text-white px-5 py-3 rounded-md shadow-md hover:bg-blue-700 transition">
                            {{ __('Add New Kegiatan') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal for displaying the image -->
    <div id="imageModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white p-6 rounded-lg max-w-3xl w-full">
            <img id="modalImage" src="" alt="Kegiatan Image" class="w-full h-auto rounded max-h-96 object-contain mx-auto">
            <button onclick="closeModal()" class="mt-4 px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">
                {{ __('Kembali') }}
            </button>
        </div>
    </div>

    <script>
        // Toggle modal visibility
        const modalToggles = document.querySelectorAll('[data-modal-toggle]');
        modalToggles.forEach(toggle => {
            toggle.addEventListener('click', () => {
                const target = document.getElementById(toggle.getAttribute('data-modal-target'));
                target.classList.toggle('hidden');
            });
        });

        // Close modal
        const closeButtons = document.querySelectorAll('.close-modal');
        closeButtons.forEach(button => {
            button.addEventListener('click', () => {
                const target = document.getElementById(button.getAttribute('data-modal-target'));
                target.classList.add('hidden');
            });
        });

        // Open image modal
        function openModal(imageUrl) {
            document.getElementById('modalImage').src = imageUrl;
            document.getElementById('imageModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('imageModal').classList.add('hidden');
        }
    </script>
@endsection