<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CalibreRequest;
use App\Models\Calibre;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CalibresController extends Controller
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
        $calibres = Calibre::all();
        return view('admin.calibres.index',
            compact('calibres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.calibres.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CalibreRequest $request)
    {
        Calibre::create($request->all());
        return redirect()->route('calibres.index')
            ->with('success', 'Calibre cadastrado com sucesso.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Calibre  $calibre
     * @return \Illuminate\Http\Response
     */
    public function edit(Calibre $calibre)
    {
        return view('admin.calibres.edit', compact('calibre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Calibre  $calibre
     * @return \Illuminate\Http\Response
     */
    public function update(CalibreRequest $request, Calibre $calibre)
    {
        $calibre_update = $request->all();
        Calibre::find($calibre->id)->fill($calibre_update)->save();

        return redirect()->route('calibres.index')
            ->with('success', 'Calibre atualizado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Calibre $calibre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Calibre $calibre)
    {
        Calibre::destroy($calibre->id);
        return response()->json(['success'=>'done']);
    }
}
