<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-black-800 leading-tight">
            Ver pelicula: {{ $pelicula->comentario }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <dl class="max-w-md text-black-900 divide-y divide-black-200 dark:text-black dark:divide-black-700">
                        <div class="flex flex-col py-3">
                            <dt class="mb-1 text-black-500 md:text-lg dark:text-black-400">
                                Titulo
                            </dt>
                            <dd class="text-lg font-semibold">
                                {{ $pelicula->ficha->titulo }}
                            </dd>
                        </div>
                        <div class="flex flex-col py-3">
                        <dt class="mb-1 text-black-500 md:text-lg dark:text-black-400">
                            Descripcion
                        </dt>
                        <dd class="text-lg font-semibold">
                            {{ $pelicula->ficha->descripcion }}
                        </dd>
                        </div>
                        <div class="flex flex-col py-3">
                            <dt class="mb-1 text-black-500 md:text-lg dark:text-black-400">
                                Director
                            </dt>
                            <dd class="text-lg font-semibold">
                                {{ $pelicula->director }}
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>
            @foreach ($comentarios as $comentario)
            <div class="flex flex-col py-3">
                <dt class="mb-1 text-black-500 md:text-lg dark:text-black-400">
                    Comentario:
                </dt>
                <dd class="text-lg font-semibold">
                    {{ $comentario->titulo}}
                </dd>
            </div>
            @endforeach
        </div>
        <form method="POST" action="{{ route('comentarios.store') }}" class="max-w-sm mx-auto">
            @csrf
            <div class="mb-5">
                <x-input-label for="comentario" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                    Comentario
                </x-input-label>
                <x-text-input name="comentario" type="text" id="comentario" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-8.5 h-32 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    :value="old('comentario')" />
                <x-input-error :messages="$errors->get('comentario')" class="mt-2" />
                <input type="hidden" name="pelicula_id" value="{{ $pelicula->id }}">
            </div>
            <button type="submit" style="background-color: black, color:white">
                Crear
            </button>
        </form>
    </div>

    <div class="mt-6 text-center">
        <a href="{{ route('peliculas.index') }}"
            class="text-black bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-2xl text-sm px-20 py-4 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
            Volver
        </a>
    </div>
</x-app-layout>