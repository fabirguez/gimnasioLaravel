<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Horario') }}
        </h2>
        
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                                             <!-- Información operación -->
                                             <x-message-status class="mb-4" :status="session('status')" />  
                    
                    <table class="relative w-full border">
                        <thead>
                            {{-- @foreach ($tramos as $tramo) --}}
                            <tr>
                                <th class="sticky top-0 px-6 py-3 text-green-900 bg-green-300">Hora</th>
                              <th class="sticky top-0 px-6 py-3 text-green-900 bg-green-300">Lunes</th>
                              <th class="sticky top-0 px-6 py-3 text-green-900 bg-green-300">Martes</th>
                              <th class="sticky top-0 px-6 py-3 text-green-900 bg-green-300">Miercoles</th>
                              <th class="sticky top-0 px-6 py-3 text-green-900 bg-green-300">Jueves</th>
                              <th class="sticky top-0 px-6 py-3 text-green-900 bg-green-300">Viernes</th>
                              <th class="sticky top-0 px-6 py-3 text-green-900 bg-green-300">Sabado</th>
                            </tr>
                          </thead>
                          <tbody class="divide-y bg-green-100">
                              @foreach ($horas as $hora)
                            <tr>
                                
                              <td class="px-6 py-4 text-center">{{$hora->hora_inicio . '-' . $hora->hora_fin}}</td>

                              
                              
                              <td class="px-6 py-4 text-center">
                                @foreach ($tramos as $tramo)
                                @if($hora->hora_inicio == $tramo->hora_inicio && $hora->hora_fin == $tramo->hora_fin && $tramo->dia == 'Lunes')
                                @foreach ($activities as $activity)
                                @if ($tramo->actividad_id == $activity->id)  
                                {{$activity->nombre}}
                                @endif
                                @endforeach
                                  @endif
                                  @endforeach
                                </td>
                              

                              
                              <td class="px-6 py-4 text-center">
                                @foreach ($tramos as $tramo)
                                @if($hora->hora_inicio == $tramo->hora_inicio && $hora->hora_fin == $tramo->hora_fin && $tramo->dia == 'Martes')  
                                @foreach ($activities as $activity)
                                @if ($tramo->actividad_id == $activity->id)  
                                {{$activity->nombre}}
                                @endif
                                @endforeach
                            @endif
                            @endforeach
                            </td>
                              

                              
                              <td class="px-6 py-4 text-center">
                                @foreach ($tramos as $tramo)
                                @if($hora->hora_inicio == $tramo->hora_inicio && $hora->hora_fin == $tramo->hora_fin && $tramo->dia == 'Miercoles')  
                                @foreach ($activities as $activity)
                                @if ($tramo->actividad_id == $activity->id)  
                                {{$activity->nombre}}
                                @endif
                                @endforeach
                            @endif
                            @endforeach
                            </td>
                              

                              
                              <td class="px-6 py-4 text-center">
                                @foreach ($tramos as $tramo)
                                @if($hora->hora_inicio == $tramo->hora_inicio && $hora->hora_fin == $tramo->hora_fin && $tramo->dia == 'Jueves')  
                                @foreach ($activities as $activity)
                                @if ($tramo->actividad_id == $activity->id)  
                                {{$activity->nombre}}
                                @endif
                                @endforeach
                            @endif
                            @endforeach
                            </td>
                              

                              
                              <td class="px-6 py-4 text-center">
                                @foreach ($tramos as $tramo)
                                @if($hora->hora_inicio == $tramo->hora_inicio && $hora->hora_fin == $tramo->hora_fin && $tramo->dia == 'Viernes')  
                                @foreach ($activities as $activity)
                                @if ($tramo->actividad_id == $activity->id)  
                                {{$activity->nombre}}
                                @endif
                                @endforeach
                            @endif
                            @endforeach
                            </td>
                              

                              
                              <td class="px-6 py-4 text-center">
                                @foreach ($tramos as $tramo)
                                @if($hora->hora_inicio == $tramo->hora_inicio && $hora->hora_fin == $tramo->hora_fin && $tramo->dia == 'Sabado')  
                                @foreach ($activities as $activity)
                                @if ($tramo->actividad_id == $activity->id)  
                                {{$activity->nombre}}
                                @endif
                                @endforeach
                            @endif
                            @endforeach
                            </td>
                              
                                
                            </tr>
                            @endforeach
                          </tbody>
                        
                    </table>
                   {{-- <table class="table table-striped">
                    <thead>
                        <tr>
                            <th> Id </th>
                            <th> Nombre </th>
                            <th> Apellidos </th>
                            <th colspan="2"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->apellidos}}</td>
                            <td>  <a class="btn btn-primary btn-sn" href="">Editar</a> </td>
                            <td></td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                   </table> --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
