<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar usuario') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="float-right">
                        <a href="{{ route('users.index') }}" class="text-blue-500">ver usuarios</a>
                    </div>
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <form method="POST" action="{{ route('users.update',$user->id) }}" class="max-w-2xl">
                      @method('PUT')
                      @csrf


                        <x-label for="name" :value="__('Name')" />

                        <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name',$user->name)" autofocus />

                <div>
                    <x-label for="last_name" :value="__('Apellidos')" />

                    <x-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name',$user->last_name)"  />
                </div>
                <div>
                    <x-label for="age" :value="__('Edad')" />

                    <x-input id="age" class="block mt-1 w-full" type="number" name="age" :value="old('age',$user->age)"  />
                </div>
                <!-- Email Address -->
                <div class="mt-4">
                    <x-label for="email" :value="__('Email')" />

                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email',$user->email)"  />
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
