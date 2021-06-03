<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('modificar Marca') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <form action="/modificaMarca" method="post">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="mkNombre">Nombre de la marca</label>
                        <input type="text" name="mkNombre"
                                value="{{old('mkNombre', $Marca->mkNombre)}}"
                               class="form-control" id="mkNombre">
                               <input type="hidden" name="idMarca"
                               value="{{ $Marca->idMarca }}">
                    </div>
                    <button class="btn btn-dark mr-3">Modificar marca</button>
                    <a href='#'class="btn btn-outline-secondary">
                        Volver a panel
                    </a>
                </form>

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
