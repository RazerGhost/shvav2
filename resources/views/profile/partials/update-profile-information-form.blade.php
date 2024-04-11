<section class="mt-6 space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profile Information') }}
        </h2>
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information.") }}
        </p>
    </header>

    <form method="post" action="{{ route('profile.update', $user) }}" class="space-y-4">
        @csrf
        @method('patch')

        <div class="">
            <label for="image" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Afbeelding</label>
            <input type="file" value={{ $user->userimg }} name="image" id="image" accept="image/png, image/jpeg" class="w-full p-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-300" required>
        </div>

        <div class="w-full mb-3">
            <img id="image-preview" src="{{ $user->userimg ?? 'https://i.stack.imgur.com/l60Hf.png' }}" alt="preview image">
        </div>

        @if (Auth::user()->role == 3)
            {
            <div class="grid grid-cols-1 gap-x-4 gap-y-4 md:grid-cols-2">
                <div>
                    <x-input-label for="name" :value="__('Naam')" />
                    <x-text-input id="name" name="name" type="text" class="block w-full mt-1" :value="old('name', $user->name)" required autofocus autocomplete="name" />
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>
            </div>
        @else
            <div class="grid grid-cols-1 gap-x-4 gap-y-4 md:grid-cols-2">
                <div>
                    <x-input-label for="first_name" :value="__('Voornaam')" />
                    <x-text-input id="first_name" name="first_name" type="text" class="block w-full mt-1" :value="old('first_name', $user->first_name)" required autofocus autocomplete="first_name" />
                    <x-input-error class="mt-2" :messages="$errors->get('first_name')" />
                </div>

                <div>
                    <x-input-label for="last_name" :value="__('Last Name')" />
                    <x-text-input id="last_name" name="last_name" type="text" class="block w-full mt-1" :value="old('last_name', $user->last_name)" required autocomplete="last_name" />
                    <x-input-error class="mt-2" :messages="$errors->get('last_name')" />
                </div>
            </div>
        @endif

        <div>
            <x-input-label for="phone" :value="__('Telefoon nummer')" />
            <x-text-input id="phone" name="phone" type="tel" class="block w-full mt-1" :value="old('phone', $user->phone)" required autocomplete="phone" />
            <x-input-error class="mt-2" :messages="$errors->get('phone')" />
        </div>

        <div>
            <x-input-label for="address" :value="__('Adres')" />
            <x-text-input id="address" name="address" type="text" class="block w-full mt-1" :value="old('address', $user->address)" required autocomplete="address" />
            <x-input-error class="mt-2" :messages="$errors->get('address')" />
        </div>

        <div class="grid grid-cols-1 gap-x-4 gap-y-4 md:grid-cols-3">
            <div>
                <x-input-label for="city" :value="__('Stad')" />
                <x-text-input id="city" name="city" type="text" class="block w-full mt-1" :value="old('city', $user->city)" required autocomplete="city" />
                <x-input-error class="mt-2" :messages="$errors->get('city')" />
            </div>

            <div>
                <x-input-label for="state" :value="__('Provincie')" />
                <x-text-input id="state" name="state" type="text" class="block w-full mt-1" :value="old('state', $user->state)" required autocomplete="state" />
                <x-input-error class="mt-2" :messages="$errors->get('state')" />
            </div>

            <div>
                <x-input-label for="zip" :value="__('Postcode')" />
                <x-text-input id="zip" name="zip" type="text" class="block w-full mt-1" :value="old('zip', $user->zip)" required autocomplete="zip" />
                <x-input-error class="mt-2" :messages="$errors->get('zip')" />
            </div>
        </div>

        <div class="flex items-center">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="ml-4 text-sm text-gray-600 dark:text-gray-400">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script type="text/javascript">
    $(document).ready(function(e) {
        $('#image').change(function() {
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#image-preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
    });
</script>
