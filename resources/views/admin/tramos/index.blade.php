<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Administración de tramos') }}
        </h2>
        
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                                             <!-- Información operación -->
                                             <x-message-status class="mb-4" :status="session('status')" />  
                    <div class="inline-block mr-2 mt-2">
                        <a href="{{route('admin.tramos.create')}}" class="focus:outline-none text-white text-sm py-2.5 px-5 border-b-4 border-blue-600 rounded-md bg-blue-500 hover:bg-blue-400">Añadir tramo</a>
                        <br><br>
                    </div>
                </div>
                    <form>
                        <label>Buscar por dia</label>
                        <input type="text" name="buscadia" id="buscadia">
                    </form>
                <div>
                    <table class="min-w-max w-full table-auto">
                        <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left">Id</th>
                                <th class="py-3 px-6 text-left">Dia</th>
                                <th class="py-3 px-6 text-center">Hora</th>
                                <th class="py-3 px-6 text-center">Actividad</th>
                                <th class="py-3 px-6 text-center">Accion</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                            @foreach ($tramos as $tramo)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                <td class="py-3 px-6 text-left whitespace-nowrap">
                                    <div class="flex items-center">
                                        {{$tramo->id}}</div>
                                </td>
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        
                                        <span>{{$tramo->dia}}</span>
                                    </div>
                                </td>
                                
                                <td class="py-3 px-6 text-center">
                                    <div class="flex items-center justify-center">
                                        <span>{{$tramo->hora_inicio . '-' . $tramo->hora_fin}}</span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex items-center justify-center">
                                        <span>
                                            

                                        @foreach ($activities as $activity)
                                @if ($tramo->actividad_id == $activity->id)  
                                {{$activity->nombre}}
                                @endif
                                @endforeach

                                        </span>
                                    </div>
                                </td>
                                <td class="py-3 px-6 text-center">
                                    <div class="flex item-center justify-center">
                                        
                                        
                                        <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                            <form action="{{route('admin.tramos.destroy',$tramo)}}" method="POST">
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
                    {{$tramos->links()}}
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
