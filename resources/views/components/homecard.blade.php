<div class="w-full p-6 bg-white rounded-md"> <!-- Adjusted width to w-80 -->
    <div class="justify-center h-48 mb-4 overflow-hidden rounded-md"> <!-- Maintain height -->
        <img src="{{ $image }}" alt="{{ $alt }}" class="object-cover w-full h-full" />
    </div>
    <div>
        <h1 class="mb-2 text-xl font-semibold">{{ $title }}</h1>
        <p class="text-gray-600">{{ $description }}</p>
        <p class="text-gray-600"> Adres: {{ $address }}</p>
        <p class="text-gray-600"> Stad: {{ $city }}</p>
        <p class="text-gray-600"> Provincie: {{ $state }}</p>
        <p class="text-gray-600">Postcode: {{ $zip }}</p>
    </div>
</div>
