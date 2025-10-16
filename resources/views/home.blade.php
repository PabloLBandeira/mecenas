<x-app-layout>
    <div class="py-24 overflow-y-scroll mb-6    ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <h2 class=" text-verde-oliva font-bold text-lg lg:text-3xl ml-2">Obras</h2>
                <div class="carousel carousel-center bg-verde-oliva rounded-box w-full h-64 p-2 space-x-2 text-sm">
                    @foreach ($artworks as $artwork)
                        <div class="carousel-item w-1/3 lg:w-32 flex flex-col items-center">
                            <a href="{{ route('artworks.show', $artwork['id']) }}">
                                <img src="{{$artwork->image->first()->path}}" alt="{{ $artwork->title }}">

                                <div class="text-start">
                                    <p class="font-semibold">{{$artwork->title}}</p>
                                    <p> {{$artwork->user->name}}</p>
                                    <p class="font-bold">R$ {{number_format($artwork->price / 100, 2, ',', '.')}}</p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>

            <h2 class=" text-verde-oliva font-bold text-lg lg:text-3xl ml-2 mt-3">Pedidos</h2>
                <div class="carousel carousel-center bg-verde-oliva w-full h-64 p-2 space-x-2 text-sm">
                    @foreach ($wishes as $wish)
                        <div class="carousel-item w-1/3 lg:w-32 flex flex-col items-center">
                            <div class="bg-marfim">
                                <div class="card-body">
                                    <p class="line-clamp-4">
                                        {{ $wish->description}}
                                    </p>
                                    <div class="text-start">
                                        <p class="font-semibold line-clamp-2">{{$wish->title}}</p>
                                        <p class="line-clamp-1">{{$wish->user->name}}</p>
                                        <p class="font-bold">R$ {{number_format($wish->budget / 100, 2, ',', '.')}}</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    @endforeach
                </div>

            <h2 class="text-verde-oliva font-bold text-lg lg:text-3xl ml-2 mt-3">Categorias</h2>
                <div class="grid grid-cols-2 w-full h-auto p-2 gap-2 justify-items-center">
                    @foreach ($categories as $category )
                        <div class="">
                            <a href="{{ route('categories.show', $category['slug']) }}" alt="" class="group block bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                                <img src="{{ $category['image'] }}" alt="" class="h-64 w-full object-cover rounded-lg group-hover:scale-105 transition-transform duration-300">
                                <p class="font-bold text-xl mb-3">{{$category['name']}}</p>
                            </a>
                        </div>
                    @endforeach
                </div>
        </div>
    </div>
</x-app-layout>
