<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tramos') }}
        </h2>
        
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Información operación -->
                    <x-message-status class="mb-4" :status="session('status')" />  


                    <div class="form-group">
                    {{-- Mensajes error --}}
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <div class="md:w-1/2 px-3 mb-6 md:mb-0">
            
                        
                        <table class="min-w-max w-full table-auto">
                            <thead>
                                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                    <th class="py-3 px-6 text-left">Actividad</th>
                                    <th class="py-3 px-6 text-left">Dia</th>
                                    <th class="py-3 px-6 text-left">Hora inicio</th>
                                    <th class="py-3 px-6 text-left">Hora fin</th>
                                    <th class="py-3 px-6 text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 text-sm font-light">
                                 
                                @foreach ($tramxus as $t)
                               
                                <tr class="border-b border-gray-200 hover:bg-gray-100">
                                    <td class="py-3 px-6 text-left">
                                        <div class="flex items-center">
                                            {{-- <span>{{$t->user_id}}</span> --}}
                                            @foreach ($tramos as $tramo)
                                            @if($t->tramo_id==$tramo->id)
                                            @foreach ($activities as $activity)
                                            @if ($tramo->actividad_id == $activity->id)  
                                            <span>{{$activity->nombre}}</span>
                                            @endif
                                            @endforeach
                                            @endif
                                            @endforeach 
                                            
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-left">
                                        <div class="flex items-center">
                                            @foreach ($tramos as $tramo)
                                            @if($t->tramo_id==$tramo->id)
                                            <span>{{$tramo->dia}}</span>
                                            @endif
                                            @endforeach 
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-left">
                                        <div class="flex items-center">
                                            @foreach ($tramos as $tramo)
                                            @if($t->tramo_id==$tramo->id)
                                            <span>{{$tramo->hora_inicio}}</span>
                                            @endif
                                            @endforeach 
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-left">
                                        <div class="flex items-center">
                                            
                                            @foreach ($tramos as $tramo)
                                            @if($t->tramo_id==$tramo->id)
                                            <span>{{$tramo->hora_fin}}</span>
                                            @endif
                                            @endforeach 
                                        </div>
                                    </td>
                                    
                                    <td class="py-3 px-6 text-center">
                                        <div class="flex item-center justify-center">
                                            
                                           
                                            <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                <form action="{{route('mistramos.destroy',$t)}}" method="POST">
                                                    @csrf
                                                    @method('delete')
                                                <button type="submit" style="width: 1.25em"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg></button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach 
                                
                            </tbody>
                        </table>
                        <br>
                    {{$tramxus->links()}}

                    </div>

                    

                    
                            

                        

                    
                </div>

                   
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
