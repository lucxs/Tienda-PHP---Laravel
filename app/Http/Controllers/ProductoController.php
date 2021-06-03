<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Marca;
use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Productos = Producto::with('relMarca', 'relCategoria')/*Ejecuta relMarca*/->paginate(8);

        return view('livewire/admin-Productos', [

            'productos'=>$Productos
        ]);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Obtenemos listado de marcas y categorias
        $Marcas = Marca::all();
        $Categorias = Categoria::all();
        //Retorno view con parametros
        return view('/livewire/agregar-Productos',[
            'marcas'=>$Marcas,
            'categorias'=>$Categorias
        ]);
    }

    private function validar(Request $request){

        $request->validate(
            [
                'prdNombre'=>'required|min:3|max:70',
                'prdPrecio'=>'required|numeric|min:0',
                'prdPresentacion'=>'required|min:3|max:150',
                'prdStock'=>'required|integer|min:1',
                'prdImagen'=>'mimes:jpg,jpeg,png,gif,svg,webp|max:2048'
            ],
            [
                'prdNombre.required'=>'Complete el campo Nombre',
                'prdNombre.min'=>'Complete el campo Nombre con al menos 3 caractéres',
                'prdNombre.max'=>'Complete el campo Nombre con 70 caractéres como máxino',
                'prdPrecio.required'=>'Complete el campo Precio',
                'prdPrecio.numeric'=>'Complete el campo Precio con un número',
                'prdPrecio.min'=>'Complete el campo Precio con un número positivo',
                'prdPresentacion.required'=>'Complete el campo Presentación',
                'prdPresentacion.min'=>'Complete el campo Presentación con al menos 3 caractéres',
                'prdPresentacion.max'=>'Complete el campo Presentación con 150 caractérescomo máxino',
                'prdStock.required'=>'Complete el campo Stock',
                'prdStock.integer'=>'Complete el campo Stock con un número entero',
                'prdStock.min'=>'Complete el campo Stock con un número positivo',
                'prdImagen.mimes'=>'Debe ser una imagen',
                'prdImagen.max'=>'Debe ser una imagen de 2MB como máximo'
            ]
        );

    }

    public function subirImagen(Request $request)
        {
            //Si no enviaron archivo en store()
            $prdImagen = 'NoDisponible.jpg';
            //Si no enviaron archivo store
            if($request->has('imgActual')){
                $prdImagen = $request->imgActual;
            }


            //Si enviaron archivo
            if($request->file('prdImagen')){//busca en request el metodo file si hay un archivo con ese nombre
                //Renombrar archivo
                #time(). extension
                $ext = $request->file('prdImagen')->extension();
                $prdImagen = time().'.'.$ext;

                //Subir imagen
                    $request->file('prdImagen')->move(public_path('productos/'));

        }
        return $prdImagen;
        }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validar
        $this->validar($request);

        //Subir img
        $prdImagen = $this->subirImagen($request);

        //Instanciar
        $Producto = new Producto;

        //asignar
        $Producto->prdNombre = $request->prdNombre;
        $Producto->prdPrecio = $request->prdPrecio;
        $Producto->idMarca = $request->idMarca;
        $Producto->idCategoria = $request->idCategoria;
        $Producto->prdPresentacion = $request->prdPresentacion;
        $Producto->prdStock = $request->prdStock;
        $Producto->prdImagen = $prdImagen;

        //guardar
        $Producto->save();

        //Retornar peticion + mensaje
        return redirect('/adminProductos')
            ->with('mensaje', 'Producto: '. $request->prdNombre. ' agregado correctamente');
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
        //Traer datos
        $Producto = Producto::with('relMarca', 'relCategoria')
                                ->find($id);

        //Obtenemos listados de marcas y categorias
            $Marcas = Marca::all();
            $Categorias = Categoria::all();
            return view('modificarProducto',[

                'Producto'=>$Producto,
                'Marcas'=>$Marcas,
                'categorias'=>$Categorias
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validar
        $this->validar($request);

        //subir archivo*
        $prdImagen = $this->subirImagen($request);
        //Obtener un producto, asignar + guardar
        $Producto = Producto::find($request->idProducto);
        $Producto->prdNombre = $request->prdNombre;
        $Producto->prdPrecio = $request->prdPrecio;
        $Producto->idMarca = $request->idMarca;
        $Producto->idCategoria = $request->idCategoria;
        $Producto->prdPresentacion = $request->prdPresentacion;
        $Producto->prdStock = $request->prdStock;
        $Producto->prdImagen = $prdImagen;
        $Producto->save();
        //redireccion + mensaje ok
        return redirect('/adminProductos')
            ->with('mensaje', 'Producto: '. $request->prdNombre. ' agregado correctamente');
    }

    public function confirmarBaja($id){
        $Producto = Producto::with('relMarca', 'relCategoria')
        ->find($id);
        return view('eliminarProducto',[
            'Producto'=>$Producto
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //Obtenemos el nombre de producto para el mensaje de confirmación
        $prdNombre = $request->prdNombre;
         $Producto = Producto::destroy($request->idProducto);

        return redirect('adminProductos') ->with([
                'mensaje', 'Producto:'. $prdNombre. 'Eliminado correctamente'
        ]);
    }
    }

