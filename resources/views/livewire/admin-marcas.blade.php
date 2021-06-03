
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Panel de Marcas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">


    @if ( session('mensaje') )
    <div class="alert alert-success">
        {{ session('mensaje') }}
    </div>
@endif

<div class="flex flex-col">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
      <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

<table  class="min-w-full divide-y divide-gray-200">
    <thead class="bg-gray-50">
        <tr>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Marca</th>
            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider" colspan="2">
                <a href="/agregarMarca" class="text-indigo-600 hover:text-indigo-900">
                    Agregar
                </a>
            </th>
        </tr>
    </thead>
    <tbody>
    @foreach( $marcas as $marca )
        <tr>
            <td class="px-6 py-4 whitespace-nowrap ">
                <div class="flex items-center">
                    <div class="ml-4">
                        <div class="text-sm font-medium text-gray-900">
                                {{ $marca->idMarca }}
                            </div>
                        </div>
                    </div>

                            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                    <div class="ml-4">
                        <div class="text-sm font-medium text-gray-900">
                            {{ $marca->mkNombre }}
                        </div>
                    </div>
                </div>

                        </td>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                    <div class="ml-4">
                        <div class="text-sm font-medium text-gray-900">
                <a href="/modificarMarca/{{$marca->idMarca}}" class="text-indigo-600 hover:text-indigo-900">
                    Modificar
                </a>
            </div>
        </div>
    </div>


            </td>
            <td class="px-6 py-4 whitespace-nowrap">
                <div class="flex items-center">
                    <div class="ml-4">
                        <div class="text-sm font-medium text-gray-900">
                <a href="/eliminarMarca" class="text-indigo-600 hover:text-indigo-900">
                    Eliminar
                </a>

            </div>
        </div>
    </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>



</div>

</div>

</div>

</div>
</div>
</div>
</x-app-layout>
