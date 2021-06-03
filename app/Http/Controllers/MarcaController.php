<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;
use Livewire\Redirector;

class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marcas =Marca::all();
        return view('/livewire/admin-marcas',[
            'marcas'=>$marcas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //retornamos vista form para agregar marca
        return view('livewire/agregar-marca');
    }

    private function validarMarca(Request $request)
    {
        $request->validate(

            [
                'mkNombre'=>'required|min:2|max:50'
            ],
            [
                'mkNombre.required'=>'El campo "Nombre de la marca" es Obligatorio',
                'mkNombre.min'=>'El campo "Nombre de la marca debe tener al menos 2 caracteres',
                'mkNombre.max'=>'El campo "Nombre de la marca debe tener 50 caracteres como máximo'
            ]

      );

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $mknombre = $_POST['mkNombre'];
        $mknombre = $request->mkNombre; //$request se pasa como parametro para la validación
        //Validación
         $this->validarMarca($request);

        //Instanciamos, asignamos valores y Guardar

                $Marca = new Marca;

                $Marca->mkNombre = $mknombre;
                $Marca->save();

        //Retornar petisión

                return redirect()->route('adminMarcas',
                )->with(

                    [

                        'mensaje'=>'Marca: '.$mknombre.' Agregada correctamente'

                    ]
                );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //obtenemos datos de una marca
        $Marca = Marca::find($id);//Esto es eloquent

        //Retornamos vista pasando datos
        return view('/livewire/modificar-marca',

        ['Marca'=>$Marca]
    );

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $mkNombre = $request->mkNombre;
        //Validamos
        $this->validarMarca($request);
        //Obtener los datos de la marca
        $Marca = Marca::find($request->idMarca);
        //Asignamos
        $Marca->mkNombre = $mkNombre;
        //guardamos
        $Marca->save();
        //retornamos a redirección con mensaje
        return redirect()->route('adminMarcas',
                )->with(

            [

                'mensaje'=>'Marca: '.$mkNombre.' Agregada correctamente'

            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
