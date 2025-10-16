<x-app-layout>
    <div class="py-24 overflow-y-scroll mb-6    ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="text-verde-oliva font-bold text-lg lg:text-3xl ml-2 mt-3 mb-4">Obras</h2>
            <div class="grid grid-cols-2 w-full h-auto p-2 gap-2 justify-items-center">
                @foreach ($artworks as $artwork)
                    <a href="{{ route('artworks.show', $artwork['id']) }}"
                    class="group block bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                        <div class="flex flex-col items-center p-4">
                            <img src="{{ $artwork->image->first()->path}}"
                                alt="{{ $artwork->title }}"
                                class="h-64 w-full object-cover rounded-lg group-hover:scale-105 transition-transform duration-300">
                            <p class="font-bold text-xl mb-3 mt-2">{{ $artwork->title }}</p>
                        <p class="text-gray-600">{{ $artwork->user->name }}</p>
                        <p class="font-bold text-verde-oliva">R$ {{ number_format($artwork->price / 100, 2, ',', '.') }}</p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
