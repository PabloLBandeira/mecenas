<x-app-layout>
    <div class="py-24 overflow-y-scroll mb-6    ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="text-verde-oliva font-bold text-lg lg:text-3xl ml-2 mt-3 mb-4">Categorias</h2>
            <div class="grid grid-cols-2 w-full h-auto p-2 gap-2 justify-items-center">
                @foreach ($categories as $category)
                    <a href="{{ route('categories.show', $category['slug']) }}"
                    class="group block bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                        <div class="flex flex-col items-center p-4">
                            <img src="{{ $category['image'] }}"
                                alt="{{ $category['name'] }}"
                                class="h-64 w-full object-cover rounded-lg group-hover:scale-105 transition-transform duration-300">
                            <p class="font-bold text-xl mb-3 mt-4 text-center text-gray-800 group-hover:text-verde-oliva transition-colors">
                                {{ $category['name'] }}
                            </p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
