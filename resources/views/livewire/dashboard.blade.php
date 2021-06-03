<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">



                <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
                    <div>
                        <x-jet-application-logo class="block h-12 w-auto" />
                    </div>

                    <div class="mt-8 text-2xl">
                        Bienvenido {{ auth()->user()->name}} a tu catalogo
                    </div>

                    <div class="mt-6 text-gray-500">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                        Voluptas sapiente quo vitae sed? Velit eius, corporis similique inventore consectetur harum iste,
                         assumenda recusandae sed minima a quidem atque, sint ullam.
                         Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi recusandae magnam non quo doloribus,
                         officia molestiae eum illum itaque veritatis quasi dicta minima illo dignissimos. Sint, vitae.
                         Quidem, quis itaque.
                    </div>
                </div>
                            <!-- los productos-->
                            <main class="my-8">
                                <div class="container mx-auto px-6">
                                <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-6">
                                  @foreach($productos as $producto)






                                            <div class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden">
                                               <div class="flex items-end justify-end h-56 w-full bg-cover" style="background-image: url('/productos/{{$producto->prdImagen}}')" >

                                                </div>
                                               <div class="px-5 py-3">
                                                   <h3 class="text-gray-700 uppercase">{{$producto->prdNombre}}</h3>
                                                     <span class="text-gray-500 mt-2">{{$producto->prdPrecio}}</span>
                                                </div>
                                            </div>







                                @endforeach

                            </div>
                        </div>
                            </main>


            </div>
        </div>
    </div>
</x-app-layout>
