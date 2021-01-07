<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar categorias') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="float-right">
                        <a href="{{ route('categories.create') }}" class="text-blue-500">Agregar categoria</a>
                    </div>
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <form method="POST" action="{{ route('categories.update',$category->id) }}" class="max-w-2xl">
                      @method('PUT')
                      @csrf

                      <!-- Email Address -->
                      <div>
                          <x-label for="name" :value="__('Nombre')" />

                          <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name',$category->name)" autofocus />
                      </div>

                        <div>
                          <x-label for="name" :value="__('Estatus')" />
                          <!-- Remember Me -->
                          <div class="block mt-4">
                              <label for="status" class="inline-flex items-center">
                                  <input id="status" type="radio" name="status" value="1" @if($category->status ==1)checked @endif>
                                  <span class="ml-2 text-sm text-gray-600">{{ __('Activo') }}</span>
                              </label>
                          </div>
                          <div class="block mt-4">
                              <label for="status1" class="inline-flex items-center">
                                  <input id="status1" type="radio" name="status" value="0" @if($category->status ==0)checked @endif>
                                  <span class="ml-2 text-sm text-gray-600">{{ __('Inactivo') }}</span>
                              </label>
                          </div>
                        </div>
                        <div>
                          <x-button class="ml-3">
                            {{ __('Actualizar') }}
                          </x-button>
                        </div>
                      </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
