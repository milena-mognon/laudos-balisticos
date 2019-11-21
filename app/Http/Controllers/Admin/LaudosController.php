<?php

/*
 * Developed by Milena Mognon
 */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Laudo;

class LaudosController extends Controller
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
        $laudos = Laudo::paginate(10);
        return view('admin.laudos.index', compact('laudos'));
    }

    public function search($rep)
    {
        $rep = str_replace('-', '/', $rep);
        $laudo = Laudo::where('rep', $rep)->first();
        if(empty($laudo)){
            return response()->json(['fail' => 'true',
            'message' => 'Nenhum laudo encontrado em este número (' . $rep . ')']);
        } else {
            $laudo_id = $laudo->id;
            return response()->json(['url' => route('laudos.show', $laudo)]);
        }
    }
}