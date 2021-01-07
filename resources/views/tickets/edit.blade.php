<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar entrada') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="float-right">
                        <a href="{{ route('tickets.create') }}" class="text-blue-500">Agregar entrada</a>
                    </div>
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                      <form method="POST" action="{{ route('tickets.update',$ticket->id) }}" class="max-w-2xl" enctype="multipart/form-data">
                          @method('PUT')
                      @csrf

                      <!-- Email Address -->
                      <div>
                          <x-label for="title" :value="__('Titulo')" />

                          <x-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title',$ticket->title)" autofocus />
                      </div>

                        <div>
                           <x-label for="file" :value="__('Imagen')" />
                          <x-input id="file" class="block mt-1 w-full" type="file" name="file" :value="$ticket->media" />
                        </div>
                              @if ($ticket->media)
                                  <img src="{{ asset('uploads/'.$ticket->media)}}" alt="imagen" class="h-20 w-20">
                              @endif
                        <div>
                           <x-label for="file" :value="__('Categorias')" />
                            @foreach($categories as $item)
                           <div class="block mt-4">
                            <label for="{{ $item->id }}" class="inline-flex items-center">
                                <input id="{{ $item->id }}" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                       name="categories[]" value="{{ $item->id }}"
                                       @if (count($ticket->categories->where('id', $item->id)))
                                       checked
                                    @endif>
                                <span class="ml-2 text-sm text-gray-600">{{ $item->name }}</span>
                            </label>

                        @endforeach
                        </div>

                        </div>
                        <div>
                          <x-button class="ml-3 mt-5">
                            {{ __('Actualizar') }}
                          </x-button>
                        </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
