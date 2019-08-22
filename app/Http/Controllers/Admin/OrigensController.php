<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\OrigemRequest;
use App\Models\Origem;
use App\Http\Controllers\Controller;

class OrigensController extends Controller
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
        $origens = Origem::paginate(10);
        return view('admin/origens/index', compact('origens'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.origens.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrigemRequest $request)
    {
        Origem::create($request->all());

        return redirect()->route('origens.index')
            ->with('success', __('flash.create_m', ['model' => 'País de Origem']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Origem  $origem
     * @return \Illuminate\Http\Response
     */
    public function edit(Origem $origem)
    {
        return view('admin.origens.edit', compact('origem'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Origem  $origem
     * @return \Illuminate\Http\Response
     */
    public function update(OrigemRequest $request, Origem $origem)
    {
        $origem_updates = $request->all();
        Origem::find($origem->id)->fill($origem_updates)->save();

        return redirect()->route('origens.index')
            ->with('success', __('flash.update_m', ['model' => 'País de Origem']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Origem $origem
     * @return \Illuminate\Http\Response
     */
    public function destroy(Origem $origem)
    {
        Origem::destroy($origem->id);
        return response()->json(['success'=>'done']);
    }
}
