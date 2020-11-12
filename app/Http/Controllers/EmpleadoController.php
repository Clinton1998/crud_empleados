<?php

namespace App\Http\Controllers;

use App\Empleado;
use Illuminate\Http\Request;
use App\Http\Requests\{RegistrarEmpleadoRequest};
use Illuminate\Support\Facades\Storage;

class EmpleadoController extends Controller
{
    private $fotos_path;

    public function __construct()
    {
        $this->fotos_path = storage_path('app/public/empleados');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('empleado.index',[
            'empleados' => Empleado::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empleado.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegistrarEmpleadoRequest $request)
    {
        $empleado = new Empleado;
        $empleado->codigo = $request->input('codigo');
        $empleado->nombre = $request->input('nombre');
        $empleado->apellidos = $request->input('apellidos');
        $empleado->direccion = $request->input('direccion');
        $empleado->dni = $request->input('dni');
        $empleado->fecha_nacimiento = $request->input('fecha_nacimiento');
        $empleado->departamento = $request->input('departamento');
        $empleado->ciudad = $request->input('ciudad');
        $empleado->save();
        $foto = $request->file('foto');

        if(!is_null($foto) && !empty($foto)){
            if (!is_null($foto) && !empty($foto)) {
            if (!is_dir($this->fotos_path)) {
                mkdir($this->fotos_path, 0777);
            }
            $name = sha1(date('YmdHis'));
            $save_name = $name . '.' . $foto->getClientOriginalExtension();
            $foto->move($this->fotos_path, $save_name);
            $empleado->foto = $save_name;
            $empleado->save();
        }    
        }

        return redirect()->route('empleados.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function show(Empleado $empleado)
    {
        return view('empleado.show',compact('empleado'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function edit(Empleado $empleado)
    {
        return view('empleado.edit',compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empleado $empleado)
    {
        $empleado->codigo = $request->input('codigo');
        $empleado->nombre = $request->input('nombre');
        $empleado->apellidos = $request->input('apellidos');
        $empleado->direccion = $request->input('direccion');
        $empleado->dni = $request->input('dni');
        $empleado->fecha_nacimiento = $request->input('fecha_nacimiento');
        $empleado->departamento = $request->input('departamento');
        $empleado->ciudad = $request->input('ciudad');
        $empleado->save();

        $foto = $request->file('foto');

        if(!is_null($foto) && !empty($foto)){
            if (!is_null($foto) && !empty($foto)) {
            if (!is_dir($this->fotos_path)) {
                mkdir($this->fotos_path, 0777);
            }
            $name = sha1(date('YmdHis'));
            $save_name = $name . '.' . $foto->getClientOriginalExtension();
            $foto->move($this->fotos_path, $save_name);
            $empleado->foto = $save_name;
            $empleado->save();
        }    
        }else{
            $empleado->foto = null;
            $empleado->save();
        }

        return redirect()->route('empleados.show',$empleado->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Empleado  $empleado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empleado $empleado)
    {
        $empleado->delete();
        return redirect()->route('empleados.index');
    }

    public function foto($fileName){
        $content = Storage::get('public/empleados/' . $fileName);
        //proceso para obtener la extension
        $ext = pathinfo($fileName)['extension'];
        $mime = '';
        if ($ext == 'jpg' || $ext == 'jpeg') {
            $mime = 'image/jpeg';
        } else if ($ext == 'gif') {
            $mime = 'image/gif';
        } else if ($ext == 'png') {
            $mime = 'image/png';
        }
        return response($content)
            ->header('Content-Type', $mime);
    }

    public function search($dni){
        $empleados = Empleado::where('dni','like','%'.$dni.'%')->get();
        return response()->json($empleados);
    }
}
