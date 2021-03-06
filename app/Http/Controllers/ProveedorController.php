<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;
use App\Traits\Template;
/**
 * Class ProveedorController
 * @package App\Http\Controllers
 */
class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proveedors = Proveedor::paginate();

        return view('Adminlte.proveedor.index', compact('proveedors'))
            ->with('i', (request()->input('page', 1) - 1) * $proveedors->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $proveedor = new Proveedor();
        return view('Adminlte.proveedor.create', compact('proveedor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Proveedor::$rules);

        $proveedor = Proveedor::create($request->all());

        return redirect()->route('AdminLte.proveedors.index')
            ->with('success', 'Proveedor creado correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proveedor = Proveedor::find($id);

        return view('Adminlte.proveedor.show', compact('proveedor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proveedor = Proveedor::find($id);

        return view('Adminlte.proveedor.edit', compact('proveedor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Proveedor $proveedor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $proveedor = Proveedor::find($id);
        request()->validate(Proveedor::$rules);

        $proveedor->update($request->all());

        return redirect()->route('AdminLte.proveedors.index')
            ->with('success', 'Proveedor actualizado correctamente.');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $proveedor = Proveedor::find($id)->delete();

        return redirect()->route('AdminLte.proveedors.index')
            ->with('success', 'Proveedor eliminado correctamente.');
    }
    public function activarProveedor(Request $request){
        $mensaje = '';
        $proveedor = Proveedor::find($request['i']);
        $proveedor->active = $request['active'];
        $proveedor->update();
        if($proveedor->active == 1){
            $mensaje = 'Proveedor activado correctamente.';
        }else{
            $mensaje = 'Proveedor desactivado correctamente.';
        }
        return redirect()->route('AdminLte.proveedors.index')
            ->with('success', $mensaje);
    }
}
