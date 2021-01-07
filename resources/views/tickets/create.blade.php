<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registrar entrada') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="float-right">
                        <a href="{{ route('tickets.index') }}" class="text-blue-500">ver entradas</a>
                    </div>

                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <form method="POST" action="{{ route('tickets.store') }}" class="max-w-2xl" enctype="multipart/form-data">
                      @csrf

                      <!-- Email Address -->
                      <div>
                          <x-label for="title" :value="__('Titulo')" />

                          <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" autofocus />
                      </div>

                        <div>
                           <x-label for="file" :value="__('Imagen')" />
                          <x-input id="file" class="block mt-1 w-full" type="file" name="file"  />
                        </div>
                        <div>
                           <x-label for="file" :value="__('Categorias')" />
                            @foreach($categories as $item)
                           <div class="block mt-4">
                            <label for="{{ $item->id }}" class="inline-flex items-center">
                                <input id="{{ $item->id }}" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="categories[]" value="{{ $item->id }}">
                                <span class="ml-2 text-sm text-gray-600">{{ $item->name }}</span>
                            </label>

                        @endforeach
                        </div>

                        </div>
                        <div>
                          <x-button class="ml-3 mt-5">
                            {{ __('Guardar') }}
                          </x-button>
                        </div>
                      </form>


                      </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
