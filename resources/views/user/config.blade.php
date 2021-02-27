<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Configuración de mi cuenta') }}
        </h2>
    </x-slot>
 
    <div class="py-6"> 
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">    
                      <!-- Información operación -->
                      <x-message-status class="mb-4" :status="session('status')" />         
                      <!-- Validation Errors -->
                      <x-auth-validation-errors class="mb-4" :errors="$errors" />
               
                      <form method="POST" action="{{ route('user.update') }}" enctype="multipart/form-data">
                          @csrf

                          <!-- Imagen de usuario -->
                         <div class="mt-4">
                            <x-label for="image" :value="__('Imagen de perfil')" />
                            <div class="flex flex-wrap justify-center mt-2">
                               <div class="w-6/12 sm:w-4/12 px-4">
                                  <img src="{{ route('user.avatar', ['filename'=>Auth::user()->imagen])}}" alt="Imagen de perfil" class="shadow rounded max-w-full h-auto align-middle border-none" />
                               </div>
                            </div>

             
                            <x-input id="image" class=" mt-1" type="file" name="image" :value="Auth::user()->imagen" />
                            

                          </div>
               
                          <!-- Name -->
            <div>
                <x-label for="name" :value="__('Nombre')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="Auth::user()->name" required autofocus />
            </div>

            <!-- Apellidos -->
            <div>
                <x-label for="apellidos" :value="__('Apellidos')" />

                <x-input id="apellidos" class="block mt-1 w-full" type="text" name="apellidos" :value="Auth::user()->apellidos" required autofocus />
            </div>



            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="Auth::user()->email" required />
            </div>

            

            <!-- Telefono -->
            <div class="mt-4">
                <x-label for="telefono" :value="__('Telefono')" />

                <x-input id="telefono" class="block mt-1 w-full" type="text" name="telefono" :value="Auth::user()->telefono" required />
            </div>

            <!-- Direccion -->
            <div class="mt-4">
                <x-label for="direccion" :value="__('Direccion')" />

                <x-input id="direccion" class="block mt-1 w-full" type="text" name="direccion" :value="Auth::user()->direccion" required />
            </div>

            

            
               
                          <div class="flex items-center justify-end mt-4">
               
                              <x-button class="ml-4">
                                  {{ __('Guardar cambios') }}
                              </x-button>
                          </div>
                      </form>              
                </div>
            </div>
        </div>
    </div>
 </x-app-layout>
