<?php

/*
 * Developed by Milena Mognon
 */

namespace App\Http\Controllers\Perito;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrigemRequest;
use App\Models\Origem;

class OrigensController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrigemRequest $request)
    {
        $origem = Origem::create($request->all());
        return response()->json(['data' => $origem]);
    }
}
