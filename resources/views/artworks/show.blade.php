<x-app-layout>
    <div class="py-24 overflow-y-scroll mb-6    ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="text-verde-oliva font-bold text-lg lg:text-3xl ml-2 mt-3 mb-4">{{$artworks->title}}</h2>
        </div>

        @foreach ($artworks->image as $image)
            <div class="flex flex-col items-center p-4">
                <img src="{{ $image->path}}" alt="{{ $artworks->title }}" class="h-64 w-full object-cover rounded-lg">
            </div>
        @endforeach
            <p class="text-gray-600">{{ $artworks->user->name }}</p>
            <p class="font-bold text-verde-oliva">R$ {{ number_format($artworks->price / 100, 2, ',', '.') }}</p>
    </div>
</x-app-layout>
