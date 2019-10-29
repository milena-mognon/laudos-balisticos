<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\UserRequest;
use App\Models\Cargo;
use App\Models\Secao;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        $cargos = Cargo::all();
        $secoes = Secao::all();
        return view('admin/users/create', compact('cargos', 'secoes'));
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(UserRequest $request)
    {
        event(new Registered($user = $this->create($request->all())));

        return redirect()->route('users.index')
            ->with('success', __('flash.create_m', ['model' => 'Usuário']));
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \Criminalistica\User
     */
    protected function create(array $data)
    {
        User::create([
            'nome' => $data['nome'],
            'email' => $data['email'],
            'secao_id' => $data['secao_id'],
            'cargo_id' => $data['cargo_id'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
