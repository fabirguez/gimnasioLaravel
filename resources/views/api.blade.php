<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tomese un descanso, tomese un cocktail') }}
        </h2>
        
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                                             <!-- Información operación -->
                                             <x-message-status class="mb-4" :status="session('status')" />  
                    
                    <table class="table-auto">
                        <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                
                                <th class="py-3 px-6 text-left">Nombre</th>
                                <th class="py-3 px-6 text-center">Categoria</th>
                                <th class="py-3 px-6 text-center">Alcohol</th>
                                <th class="py-3 px-6 text-center">Instrucciones</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                            @foreach ($cocktail as $c)
                            <tr class="border-b border-gray-200 hover:bg-gray-100">
                                
                                <td class="py-3 px-6 text-left">
                                    <div class="flex items-center">
                                        
                                        <span>{{$c->strDrink}}</span>
                                    </div>
                                </td>
                                
                                <td class="py-3 px-6 text-center">
                                    <div class="flex items-center justify-center">
                                        <span>{{$c->strCategory}}</span>
                                    </div>
                                </td>

                                <td class="py-3 px-6 text-center">
                                    <div class="flex items-center justify-center">
                                        <span>{{$c->strAlcoholic}}</span>
                                    </div>
                                </td>

                                <td class="py-3 px-6 text-center">
                                    <div class="flex items-center justify-center">
                                        <span>{{$c->strInstructions}}</span>
                                    </div>
                                </td>
                                
                                
                            </tr>
                            @endforeach 
                        </tbody>
                    </table>
<br>
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
