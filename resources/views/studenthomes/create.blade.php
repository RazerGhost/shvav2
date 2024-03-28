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
                    <form action="{{ route('studenthomes.store') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="flex w-full flex-row gap-4">
                            <div class="flex w-1/2 flex-col gap-4">
                                <div class="">
                                    <label for="image" class="mb-2 block text-sm text-gray-600 dark:text-gray-400">Image</label>
                                    <input type="file" name="image" id="image" accept="image/png, image/jpeg" class="w-full rounded-md border border-gray-300 p-2 dark:bg-gray-700 dark:text-gray-300" required>
                                </div>

                                <div class="mb-3 w-full">
                                    <img id="image-preview" src="https://cdn.dribbble.com/users/4438388/screenshots/15854247/media/0cd6be830e32f80192d496e50cfa9dbc.jpg?resize=1000x750&vertical=center" alt="preview image">
                                </div>
                            </div>
                            <div class="flex w-1/2 flex-col">
                                {{-- name --}}
                                <div class="mb-4">
                                    <label for="name" class="mb-2 block text-sm text-gray-600 dark:text-gray-400">Name</label>
                                    <input type="text" name="name" id="name" class="w-full rounded-md border border-gray-300 p-2 dark:bg-gray-700 dark:text-gray-300" required>
                                </div>
                                {{-- description --}}
                                <div class="mb-4">
                                    <label for="description" class="mb-2 block text-sm text-gray-600 dark:text-gray-400">Description</label>
                                    <input type="text" name="description" id="description" class="w-full rounded-md border border-gray-300 p-2 dark:bg-gray-700 dark:text-gray-300" required>
                                </div>
                                {{-- address --}}
                                <div class="mb-4">
                                    <label for="address" class="mb-2 block text-sm text-gray-600 dark:text-gray-400">Address</label>
                                    <input type="text" name="address" id="address" class="w-full rounded-md border border-gray-300 p-2 dark:bg-gray-700 dark:text-gray-300" required>
                                </div>
                                {{-- city --}}
                                <div class="mb-4">
                                    <label for="city" class="mb-2 block text-sm text-gray-600 dark:text-gray-400">City</label>
                                    <input type="text" name="city" id="city" class="w-full rounded-md border border-gray-300 p-2 dark:bg-gray-700 dark:text-gray-300" required>
                                </div>
                                {{-- state --}}
                                <div class="mb-4">
                                    <label for="state" class="mb-2 block text-sm text-gray-600 dark:text-gray-400">State</label>
                                    <input type="text" name="state" id="state" class="w-full rounded-md border border-gray-300 p-2 dark:bg-gray-700 dark:text-gray-300" required>
                                </div>
                                {{-- zip --}}
                                <div class="mb-4">
                                    <label for="zip" class="mb-2 block text-sm text-gray-600 dark:text-gray-400">Zip</label>
                                    <input type="text" name="zip" id="zip" class="w-full rounded-md border border-gray-300 p-2 dark:bg-gray-700 dark:text-gray-300" required>
                                </div>
                                <div class="mb-4">
                                    <x-primary-button type="submit" class="w-full rounded-md bg-blue-500 p-2 text-white">Submit</x-primary-button>
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
