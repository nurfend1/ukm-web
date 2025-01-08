<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Update Password') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('user.updatePassword') }}">
                        @csrf
                        <div class="mb-4">
                            <label for="current_password" class="block text-sm font-medium text-gray-700">{{ __('Current Password') }}</label>
                            <input type="password" id="current_password" name="current_password" class="mt-1 block w-full" required>
                            @error('current_password')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password" class="block text-sm font-medium text-gray-700">{{ __('New Password') }}</label>
                            <input type="password" id="password" name="password" class="mt-1 block w-full" required>
                            @error('password')
                                <span class="text-red-600 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700">{{ __('Confirm New Password') }}</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" class="mt-1 block w-full" required>
                        </div>

                        <button type="submit" class="btn btn-primary">{{ __('Update Password') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
