<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cargo;
use App\Models\Secao;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
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
        $users = User::all();
        return view('admin/users/index', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $secoes = Secao::orderBy('nome')->get();
        $cargos = Cargo::orderBy('nome')->get();
        return view('admin/users/edit',
            compact('user', 'secoes', 'cargos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'email' => 'required|string|email|max:255|unique:users',
            'nome' => 'required|min:6',
            'secao_id' => 'required|int',
            'cargo_id' => 'required|int'
        ]);
        $user_updates = $request->all();
        User::find($user->id)->fill($user_updates)->save();

        return redirect()->route('users.index')
            ->with('success', 'Usuário atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($user)
    {
        User::destroy($user);
        return response()->json(['success'=>'done']);
    }
}
