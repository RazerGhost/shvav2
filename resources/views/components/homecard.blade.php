<div class="flex justify-center">
    <div class="p-6 bg-white rounded-md shadow-md">
        <div class="w-full h-32 mb-4 overflow-hidden rounded-md">
            <img src="{{ $image }}" alt="{{ $alt }}" class="object-cover w-100" />
        </div>
        <div>
            <h1 class="mb-2 text-xl font-semibold">{{ $title }}</h1>
            <p class="text-gray-600">{{ $content }}</p>
        </div>
    </div>
</div>
