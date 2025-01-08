<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Activity Logs') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="font-semibold text-lg mb-4">{{ __('Activity Logs') }}</h3>
                    <p>{{ __("View the latest activity logs below.") }}</p>
                    <!-- Contoh tabel log -->
                    <table class="min-w-full bg-white dark:bg-gray-800 mt-4">
                        <thead>
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Date') }}
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    {{ __('Activity') }}
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Contoh data log, sesuaikan dengan data aktual -->
                            <tr>
                                <td class="px-6 py-4">2024-11-07</td>
                                <td class="px-6 py-4">{{ __('User logged in') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
