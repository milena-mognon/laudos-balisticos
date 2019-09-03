<?php

/*
 * Developed by Milena Mognon
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DiretorRequest;
use App\Models\Diretor;

class DiretoresController extends Controller
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
        $diretores = Diretor::paginate(10);
        return view('admin.diretores.index', compact('diretores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.diretores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(DiretorRequest $request)
    {
        $diretor = Diretor::config_diretor_info($request);
        Diretor::create($diretor);

        return redirect()->route('diretores.index')
            ->with('success', __('flash.create_m', ['model' => 'Diretor']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Diretor $diretor
     * @return \Illuminate\Http\Response
     */
    public function edit(Diretor $diretor)
    {
        return view('admin.diretores.edit', compact('diretor'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Models\Diretor $diretor
     * @return \Illuminate\Http\Response
     */
    public function update(DiretorRequest $request, Diretor $diretor)
    {
        $diretor_updates = Diretor::config_diretor_info($request);
        Diretor::find($diretor->id)->fill($diretor_updates)->save();

        return redirect()->route('diretores.index')
            ->with('success', __('flash.update_m', ['model' => 'Diretor']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Diretor $diretor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Diretor $diretor)
    {
        Diretor::destroy($diretor->id);
        return response()->json(['success' => 'done']);
    }
}
