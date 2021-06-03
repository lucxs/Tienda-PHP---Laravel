<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Alta de una nueva Marca') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <!--Aca empieza el recuadro del form-->
                    <div class="mt-5 md:mt-0 md:col-span-2">
                <form action="/agregaMarca" method="post" >
                    @csrf
                    <div class="shadow sm:rounded-md sm:overflow-hidden">
                        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                          <div class="grid grid-cols-3 gap-6">
                            <div class="col-span-3 sm:col-span-2">
                        <label for="mkNombre" class="block text-sm font-medium text-gray-700">
                            Nombre de la marca</label>

                        <input type="text" name="mkNombre"
                                value="{{old('mkNombre')}}"
                               class="form-control" id="mkNombre">
                                <br>
                                <br>
                    <button class="ml-5 bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Agregar marca</button>
                    <a href="/livewire/admin-marcas" type="button" class="ml-5 bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Volver a panel
                    </a>
                </form>
            </div>
                @if($errors)
                    <div class="alert alert-danger col-8 mx-auto p-2">
                            <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                            </ul>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
