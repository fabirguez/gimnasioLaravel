<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'telefono' => 'required|integer|min:600000000|max:999999999',
            'direccion' => 'required|string|max:255',
            'rol_id' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'apellidos' => $request->apellidos,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
            'rol_id' => $request->rol_id,
        ]);

        return redirect()->route('admin.users.index')->with(['status' => 'Usuario agregado con éxito']);
    }

    /**
     * Display the specified resource.
     *
     * @param int $user
     *
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $user
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $user
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if ($request->password == '') {
            $request->validate([
                'name' => 'required|string|max:255',
                'apellidos' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
                'telefono' => 'required|integer|min:600000000|max:999999999',
                'direccion' => 'required|string|max:255',
                'rol_id' => 'required',
            ]);
            $user->name = $request->name;
            $user->apellidos = $request->apellidos;
            $user->email = $request->email;

            $user->telefono = $request->telefono;
            $user->direccion = $request->direccion;
            $user->rol_id = $request->rol_id;

            $user->save();
        } else {
            $request->validate([
                'name' => 'required|string|max:255',
                'apellidos' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
                'password' => 'string|confirmed|min:8',
                'telefono' => 'required|integer|min:600000000|max:999999999',
                'direccion' => 'required|string|max:255',
                'rol_id' => 'required',
            ]);
            $user->name = $request->name;
            $user->apellidos = $request->apellidos;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->telefono = $request->telefono;
            $user->direccion = $request->direccion;
            $user->rol_id = $request->rol_id;

            $user->save();
        }

        return redirect()->route('admin.users.index')->with(['status' => 'Usuario actualizado con éxito']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $user
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.users.index')->with(['status' => 'Usuario borrado con éxito']);
    }
}
