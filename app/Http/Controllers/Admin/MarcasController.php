<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\MarcaRequest;
use App\Models\Marca;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MarcasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marcas = Marca::paginate(10);
        return view('admin.marcas.index',
            compact('marcas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.marcas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MarcaRequest $request)
    {
        Marca::create($request->all());

        return redirect()->route('marcas.index')
            ->with('success', __('flash.create_f', ['model' => 'Marca']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function edit(Marca $marca)
    {
        return view('admin.marcas.edit', compact('marca'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function update(MarcaRequest $request, Marca $marca)
    {
        $marca_updates = $request->all();
        Marca::find($marca->id)->fill($marca_updates)->save();

        return redirect()->route('marcas.index')
            ->with('success', __('flash.update_f', ['model' => 'Marca']));;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Marca $marca
     * @return \Illuminate\Http\Response
     */
    public function destroy(Marca $marca)
    {
        Marca::destroy($marca->id);
        return response()->json(['success'=>'done']);
    }
}
