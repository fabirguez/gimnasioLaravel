<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin edit user view') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                     {!! Form::model($user,['route'=> ['admin.users.update', $user], "method"=>"put"]) !!}

                     <div class="form-group">
                        {{-- Mensajes error --}}
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                
                         {!! Form::label('name', 'Nombre', ['class'=>"block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"]) !!}
                         {!! Form::text('name', null, ['class'=>"appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3", 'placeholder'=>'Juan']) !!}

                         {{-- @error('name')
                            <span class="mb-4">{{$message}}</span>
                         @enderror --}}

                        </div>

                        <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                         {!! Form::label('apellidos', 'Apellidos', ['class'=>"block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"]) !!}
                         {!! Form::text('apellidos', null, ['class'=>"appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3", 'placeholder'=>'Rodriguez']) !!}
                         </div>

                        <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                         {!! Form::label('email', 'Email', ['class'=>"block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"]) !!}
                         {!! Form::email('email', null, ['class'=>"appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3", 'placeholder'=>'prueba@prueba.es']) !!}
                         </div>

                        <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                         {!! Form::label('password', 'Contraseña', ['class'=>"block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"]) !!}
                         {!! Form::password('password', ['class'=>"appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"]) !!}
                         </div>

                         <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                            {!! Form::label('password_confirmation', 'Repita la password', ['class'=>"block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"]) !!}
                            {!! Form::password('password_confirmation', ['class'=>"appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"]) !!}
                            </div>

                        <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                         {!! Form::label('telefono', 'Telefono', ['class'=>"block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"]) !!}
                         {!! Form::text('telefono', null, ['class'=>"appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"]) !!}
                         </div>

                        <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                         {!! Form::label('direccion', 'Direccion', ['class'=>"block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"]) !!}
                         {!! Form::text('direccion', null, ['class'=>"appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"]) !!}
                        </div>


                         {!! Form::label('admin', 'Administrador') !!}
                         {!! Form::radio('rol_id', 0, 0, ['class'=>"form-radio h-5 w-5 text-red-600"]) !!}
                         {!! Form::label('user', 'Usuario') !!}
                         {!! Form::radio('rol_id', 1, 0, ['class'=>"form-radio h-5 w-5 text-red-600"]) !!}
                    </div>

                    {!! Form::submit('Actualizar usuario', ['class'=>"border border-red-500 text-red-500 rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:text-white hover:bg-red-600 focus:outline-none focus:shadow-outline"]) !!}
                     {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
