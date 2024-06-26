<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Edit employee') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <form method="POST" action="{{ route('employee.updateuser', $user) }}" class="p-6">
                    @csrf
                    @method('PATCH')
                    @if ($user->role == 3)
                        <div class="grid grid-cols-2 gap-4 mb-4">
                            <!-- Name -->
                            <div>
                                <x-input-label for="name" :value="__('Naam')" />
                                <input id="name" class="w-full p-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-300" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" value="{{ $user->name }}" />
                                <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>
                        </div>
                    @else
                        <div class="grid grid-cols-2 gap-4 mb-4">
                            <!-- First Name -->
                            <div>
                                <x-input-label for="first_name" :value="__('Voornaam')" />
                                <input id="first_name" class="w-full p-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-300" type="text" name="first_name" :value="old('first_name')" required autofocus autocomplete="first_name" value="{{ $user->first_name }}" />
                                <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                            </div>

                            <!-- Last Name -->
                            <div>
                                <x-input-label for="last_name" :value="__('Achternaam')" />
                                <input id="last_name" class="w-full p-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-300" type="text" name="last_name" :value="old('last_name')" required autocomplete="last_name" value="{{ $user->last_name }}" />
                                <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                            </div>
                        </div>
                    @endif

                    <!-- Tel Number -->
                    <div class="mb-4">
                        <label for="tel_number" class="block text-sm text-gray-600 dark:text-gray-400">{{ __('Tel Number') }}</label>
                        <input type="tel" name="tel_number" id="tel_number" class="w-full p-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-300" required value="{{ $user->phone }}">
                    </div>

                    <!-- Email Address -->
                    <div class="mb-4">
                        <x-input-label for="email" :value="__('Email')" />
                        <input id="email" class="w-full p-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-300" type="email" name="email" :value="old('email')" required autocomplete="username" value="{{ $user->email }}" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <x-input-label for="password" :value="__('Wachtwoord')" />
                            <input id="password" class="w-full p-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-300" type="password" name="password" required autocomplete="new-password" value="{{ $user->password }}" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                        <div>
                            <x-input-label for="password_confirmation" :value="__('Wachtwoord bevestigen')" />
                            <input id="password_confirmation" class="w-full p-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-300" type="password" name="password_confirmation" required autocomplete="new-password" :value="old(password_confirmation)" />
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>
                    </div>

                    <!-- Address -->
                    <div class="mb-4">
                        <label for="address" class="block text-sm text-gray-600 dark:text-gray-400">{{ __('Adres') }}</label>
                        <input type="text" name="address" id="address" class="w-full p-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-300" required value="{{ $user->address }}">
                    </div>

                    <!-- City, State, Zip -->
                    <div class="grid grid-cols-3 gap-4 mb-4">
                        <!-- City -->
                        <div>
                            <label for="city" class="block text-sm text-gray-600 dark:text-gray-400">{{ __('Stad') }}</label>
                            <input type="text" name="city" id="city" class="w-full p-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-300" required value="{{ $user->city }}">
                        </div>

                        <!-- State -->
                        <div>
                            <label for="state" class="block text-sm text-gray-600 dark:text-gray-400">{{ __('Provincie') }}</label>
                            <input type="text" name="state" id="state" class="w-full p-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-300" required value="{{ $user->state }}">
                        </div>

                        <!-- Zip -->
                        <div>
                            <label for="zip" class="block text-sm text-gray-600 dark:text-gray-400">{{ __('Postcode') }}</label>
                            <input type="text" name="zip" id="zip" class="w-full p-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-300" required value="{{ $user->zip }}">
                        </div>
                    </div>

                    <!-- Role -->
                    <x-text-input class="hidden" type="text" name="role" id="role" value="{{ $user->role }}" />

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
