@extends('layouts.app')

@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Manage UKMs') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="font-semibold text-lg mb-4">{{ __('UKM List') }}</h3>

                    <a href="{{ route('admin.createUkm') }}" class="text-blue-600 hover:underline">
                        {{ __('Add New UKM') }}
                    </a>

                    <table class="mt-4 w-full border border-gray-200 rounded-lg overflow-hidden">
                        <thead>
                            <tr class="bg-gray-100">
                                <th class="py-2 px-4 text-left font-semibold text-gray-600">Name</th>
                                <th class="py-2 px-4 text-left font-semibold text-gray-600">Description</th>
                                <th class="py-2 px-4 text-left font-semibold text-gray-600">Logo</th>
                                <th class="py-2 px-4 text-left font-semibold text-gray-600">Managed User</th>
                                <th class="py-2 px-4 text-left font-semibold text-gray-600">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($ukms as $ukm)
                                <tr class="hover:bg-gray-50">
                                    <td class="py-3 px-4 text-gray-800">{{ $ukm->name }}</td>
                                    <td class="py-3 px-4 text-gray-600">{{ $ukm->description }}</td>
                                    <td class="py-3 px-4">
                                        @if($ukm->logo_url)
                                        <img src="{{ asset('storage/' . $ukm->logo_url) }}" alt="{{ $ukm->name }}" class="w-10 h-10 object-cover rounded-full shadow">
                                        @else
                                            <span class="text-gray-500">{{ __('No Logo') }}</span>
                                        @endif
                                    </td>
                                    <td class="py-3 px-4 text-gray-600">
                                        @if($ukm->managers->isNotEmpty())
                                            @foreach($ukm->managers as $manager)
                                                <span class="inline-block bg-gray-200 text-gray-700 rounded px-2 py-1 text-xs font-medium mr-1">
                                                    {{ $manager->name }}
                                                </span>
                                            @endforeach
                                        @else
                                            <span class="text-gray-400">{{ __('No Manager') }}</span>
                                        @endif
                                    </td>
                                    <td class="py-3 px-4 flex space-x-2">
                                        <!-- Edit Button -->
                                        <a href="{{ route('admin.editUkm', $ukm->id) }}" class="px-3 py-1 bg-blue-500 text-white rounded hover:bg-blue-600 focus:outline-none transition">
                                            {{ __('Edit') }}
                                        </a>
                                        <!-- Delete Button -->
                                        <form action="{{ route('admin.deleteUkm', $ukm->id) }}" method="POST" onsubmit="return confirm('{{ __('Are you sure you want to delete this UKM?') }}');" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-3 py-1 bg-red-500 text-white rounded hover:bg-red-600 focus:outline-none transition">
                                                {{ __('Delete') }}
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
  @endsection