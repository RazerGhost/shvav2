<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('studenthomes.update', $studenthome) }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        @method('PATCH')
                        <div class="flex flex-row w-full gap-4">
                            <div class="flex flex-col w-1/2 gap-4">
                                <div class="">
                                    <label for="image" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Afbeelding</label>
                                    <input type="file" value={{ $studenthome->image }} name="image" id="image" accept="image/png, image/jpeg" class="w-full p-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-300" required>
                                </div>
                                <div class="w-full mb-3">
                                    <img id="image-preview" src="{{ $studenthome->image }}" alt="preview image">
                                </div>
                            </div>
                            <div class="flex flex-col w-1/2">
                                {{-- name --}}
                                <div class="mb-4">
                                    <label for="name" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Naam</label>
                                    <input type="text" value="{{ $studenthome->name }}" name="name" id="name" class="w-full p-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-300" required>
                                </div>
                                {{-- description --}}
                                <div class="mb-4">
                                    <label for="description" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Beschrijving</label>
                                    <input type="text" value="{{ $studenthome->description }}" name="description" id="description" class="w-full p-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-300" required>
                                </div>
                                {{-- address --}}
                                <div class="mb-4">
                                    <label for="address" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Adres</label>
                                    <input type="text" value="{{ $studenthome->address }}" name="address" id="address" class="w-full p-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-300" required>
                                </div>
                                {{-- city --}}
                                <div class="mb-4">
                                    <label for="city" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Stad</label>
                                    <input type="text" value="{{ $studenthome->city }}" name="city" id="city" class="w-full p-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-300" required>
                                </div>
                                {{-- state --}}
                                <div class="mb-4">
                                    <label for="state" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Provincie</label>
                                    <input type="text" value="{{ $studenthome->state }}" name="state" id="state" class="w-full p-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-300" required>
                                </div>
                                {{-- zip --}}
                                <div class="mb-4">
                                    <label for="zip" class="block mb-2 text-sm text-gray-600 dark:text-gray-400">Postcode</label>
                                    <input type="text" value="{{ $studenthome->zip }}" name="zip" id="zip" class="w-full p-2 border border-gray-300 rounded-md dark:bg-gray-700 dark:text-gray-300" required>
                                </div>
                                <div class="mb-4">
                                    <x-primary-button type="submit" class="w-full p-2 text-white bg-blue-500 rounded-md">Verzenden</x-primary-button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

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
