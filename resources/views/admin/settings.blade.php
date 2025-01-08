<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Settings') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="font-semibold text-lg mb-4">{{ __('Application Settings') }}</h3>
                    <p class="mb-6">{{ __("Configure your application settings here.") }}</p>

                    <!-- Form Settings -->
                    <form action="{{ route('admin.updateSettings') }}" method="POST">
                        @csrf

                        <!-- Notification Settings -->
                        <div class="mb-6">
                            <h4 class="font-semibold text-md">{{ __('Notification Settings') }}</h4>
                            <label for="email_notifications" class="flex items-center mt-2">
                                <input type="checkbox" id="email_notifications" name="email_notifications" class="mr-2">
                                <span>{{ __('Enable Email Notifications') }}</span>
                            </label>
                            <label for="sms_notifications" class="flex items-center mt-2">
                                <input type="checkbox" id="sms_notifications" name="sms_notifications" class="mr-2">
                                <span>{{ __('Enable SMS Notifications') }}</span>
                            </label>
                        </div>

                        <!-- Language Settings -->
                        <div class="mb-6">
                            <h4 class="font-semibold text-md">{{ __('Language Settings') }}</h4>
                            <label for="language" class="block mt-2">{{ __('Select Language') }}</label>
                            <select id="language" name="language" class="w-full mt-2 p-2 border rounded">
                                <option value="en">{{ __('English') }}</option>
                                <option value="id">{{ __('Indonesian') }}</option>
                                <!-- Tambahkan pilihan bahasa lainnya jika perlu -->
                            </select>
                        </div>

                        <!-- Privacy Settings -->
                        <div class="mb-6">
                            <h4 class="font-semibold text-md">{{ __('Privacy Settings') }}</h4>
                            <label for="public_profile" class="flex items-center mt-2">
                                <input type="checkbox" id="public_profile" name="public_profile" class="mr-2">
                                <span>{{ __('Make Profile Public') }}</span>
                            </label>
                            <label for="data_sharing" class="flex items-center mt-2">
                                <input type="checkbox" id="data_sharing" name="data_sharing" class="mr-2">
                                <span>{{ __('Allow Data Sharing with Partners') }}</span>
                            </label>
                        </div>

                        <!-- Save Button -->
                        <div class="mt-8">
                            <x-primary-button type="submit">
                                {{ __('Save Settings') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
