<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar actividad') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                     {!! Form::model($activity,['route'=> ['admin.activities.update', $activity], "method"=>"put"]) !!}

                     <div class="form-group">
                        {{-- Mensajes error --}}
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                
                         {!! Form::label('nombre', 'Nombre', ['class'=>"block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"]) !!}
                         {!! Form::text('nombre', null, ['class'=>"appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3", 'placeholder'=>'Cinta']) !!}

                         {{-- @error('name')
                            <span class="mb-4">{{$message}}</span>
                         @enderror --}}

                        </div>

                        <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                         {!! Form::label('descripcion', 'Descripcion', ['class'=>"block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"]) !!}
                         {!! Form::text('descripcion', null, ['class'=>"appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3", 'placeholder'=>'Correr encima de una maquina']) !!}
                         </div>

                        <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                         {!! Form::label('aforo', 'Aforo', ['class'=>"block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"]) !!}
                         {!! Form::text('aforo', null, ['class'=>"appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3", 'placeholder'=>'20']) !!}
                         </div>

                    </div>

                    {!! Form::submit('Actualizar actividad', ['class'=>"border border-red-500 text-red-500 rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:text-white hover:bg-red-600 focus:outline-none focus:shadow-outline"]) !!}
                     {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
