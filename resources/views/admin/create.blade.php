<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Create employee') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <form method="POST" action="{{ route('admin.storeuser') }}" class="p-6">
                    @csrf

                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <!-- First Name -->
                        <div>
                            <x-input-label for="first_name" :value="__('First Name')" />
                            <input id="first_name" class="w-full p-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-300" type="text" name="first_name" :value="old('first_name')" required autofocus autocomplete="first_name" />
                            <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                        </div>

                        <!-- Last Name -->
                        <div>
                            <x-input-label for="last_name" :value="__('Last Name')" />
                            <input id="last_name" class="w-full p-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-300" type="text" name="last_name" :value="old('last_name')" required autocomplete="last_name" />
                            <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                        </div>
                    </div>

                    <!-- Tel Number -->
                    <div class="mb-4">
                        <label for="tel_number" class="block text-sm text-gray-600 dark:text-gray-400">{{ __('Tel Number') }}</label>
                        <input type="tel" name="tel_number" id="tel_number" class="w-full p-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-300" required>
                    </div>

                    <!-- Email Address -->
                    <div class="mb-4">
                        <x-input-label for="email" :value="__('Email')" />
                        <input id="email" class="w-full p-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-300" type="email" name="email" :value="old('email')" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <x-input-label for="password" :value="__('Password')" />
                            <input id="password" class="w-full p-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-300" type="password" name="password" required autocomplete="new-password" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Confirm Password -->
                        <div>
                            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                            <input id="password_confirmation" class="w-full p-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-300" type="password" name="password_confirmation" required autocomplete="new-password" />
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>
                    </div>

                    <!-- Address -->
                    <div class="mb-4">
                        <label for="address" class="block text-sm text-gray-600 dark:text-gray-400">{{ __('Address') }}</label>
                        <input type="text" name="address" id="address" class="w-full p-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-300" required>
                    </div>

                    <!-- City, State, Zip -->
                    <div class="grid grid-cols-3 gap-4 mb-4">
                        <!-- City -->
                        <div>
                            <label for="city" class="block text-sm text-gray-600 dark:text-gray-400">{{ __('City') }}</label>
                            <input type="text" name="city" id="city" class="w-full p-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-300" required>
                        </div>

                        <!-- State -->
                        <div>
                            <label for="state" class="block text-sm text-gray-600 dark:text-gray-400">{{ __('State') }}</label>
                            <input type="text" name="state" id="state" class="w-full p-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-300" required>
                        </div>

                        <!-- Zip -->
                        <div>
                            <label for="zip" class="block text-sm text-gray-600 dark:text-gray-400">{{ __('Zip') }}</label>
                            <input type="text" name="zip" id="zip" class="w-full p-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-300" required>
                        </div>
                    </div>

                    <!-- Role -->
                    <x-text-input class="hidden" type="text" name="role" id="role" value="1" />

                    <div class="flex items-center justify-end mb-4">
                        <x-primary-button class="ms-4">
                            {{ __('Register') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
