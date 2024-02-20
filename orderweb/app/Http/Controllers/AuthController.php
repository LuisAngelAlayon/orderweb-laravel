<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    private $rules = [
        'name' => 'required |string|max:255',
        'email' => 'required |string|email|max:255|unique:users',
        'password' => 'required |string|min:8|max:255',
        'password_confirmation' => 'required |string|min:8|max:255|same:password',
    ];

    private $traductionAttributes = array(
        'name' => 'Nombre',
        'password' => 'Contraseña',

    );



    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->check()) {
            return redirect()->route('index');
        }

        return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), $this->rules);
        $validator->setAttributeNames($this->traductionAttributes);

        if ($validator->fails()) {

            $errors = $validator->errors();
            return redirect('auth/register')->withErrors($validator)->withInput();
        }

        $request['password'] = bcrypt($request['password']);
        $user = User::create($request->all());
        session()->flash('message', 'Registro creado exitosamente');
        return redirect()->route('auth.index');

    }



    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('index');
        }

        return back()->withErrors([
            'email' => 'Credenciales incorrectas, intente de nuevo',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        return redirect('auth/index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
