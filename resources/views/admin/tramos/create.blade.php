<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Añadir Tramo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Información operación -->
                    <x-message-status class="mb-4" :status="session('status')" />  
                     {!! Form::open(['route'=> 'admin.tramos.store']) !!}

                     <div class="form-group">
                        {{-- Mensajes error --}}
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                
                         {!! Form::label('dia', 'Dia', ['class'=>"block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"]) !!}
                         {{-- {!! Form::text('dia', null, ['class'=>"appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3", 'placeholder'=>'Lunes']) !!} --}}
                         {{-- {!! Form::text('dia', null, ['class'=>"appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3", 'placeholder'=>'Lunes']) !!} --}}
                         {!! Form::select('dia', array(
                             'Lunes' => 'Lunes',
                            'Martes' => 'Martes',
                            'Miercoles' => 'Miercoles',
                            'Jueves' => 'Jueves',
                            'Viernes' => 'Viernes',
                            'Sabado' => 'Sabado',), '', ['class'=>"appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3"]) !!}
                          
                         {{-- @error('name')
                            <span class="mb-4">{{$message}}</span>
                         @enderror --}}

                        </div>

                        <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                         {!! Form::label('hora_inicio', 'Hora de Inicio', ['class'=>"block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"]) !!}
                         {!! Form::text('hora_inicio', null, ['class'=>"appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3", 'placeholder'=>'HH:MM:SS']) !!}
                         </div>

                         <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                            {!! Form::label('hora_fin', 'Hora de Fin', ['class'=>"block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"]) !!}
                            {!! Form::text('hora_fin', null, ['class'=>"appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3", 'placeholder'=>'12:30:00']) !!}
                            </div>

                            <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                                {!! Form::label('actividad_id', 'ID Actividad', ['class'=>"block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"]) !!}
                                {!! Form::text('actividad_id', null, ['class'=>"appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3", 'placeholder'=>'1']) !!}
                                </div>

                                <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                                    {!! Form::label('fecha_alta', 'Fecha de Alta', ['class'=>"block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"]) !!}
                                    {!! Form::text('fecha_alta', null, ['class'=>"appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3", 'placeholder'=>'AAAA-MM-DD']) !!}
                                    </div>

                                    <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                                        {!! Form::label('fecha_baja', 'Fecha de Baja', ['class'=>"block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"]) !!}
                                        {!! Form::text('fecha_baja', null, ['class'=>"appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3", 'placeholder'=>'2021-28-02']) !!}
                                        </div>

                        
                                

                         

                        
                    </div>

                    {!! Form::submit('Crear Tramo', ['class'=>"border border-red-500 text-red-500 rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:text-white hover:bg-red-600 focus:outline-none focus:shadow-outline"]) !!}
                     {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
