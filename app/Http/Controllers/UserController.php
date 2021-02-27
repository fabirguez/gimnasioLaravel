<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function config()
    {
        return view('user.config');
    }

    public function password()
    {
        return view('user.password');
    }

    public function index()
    {
        return 'Index user controller';
    }

    public function create()
    {
        return 'Create en user controller';
    }

    public function show($id)
    {
        return 'Show user en user controller';
    }

    public function update(Request $request)
    {
        $user = User::find(Auth::user()->id);

        $request->validate([
            'name' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            // 'password' => 'required|string|confirmed|min:8',
            'telefono' => 'required|integer|min:600000000|max:999999999',
            'direccion' => 'required|string|max:255',
        ]);

        //Subir la imagen
        $image = $request->file('image');
        // Si recibimos un objeto imagen tendremos que utilizar el disco para almacenarla
        // Para ello utilizaremos un objeto storage de Laravel
        if ($image) {
            // Generamos un nombre único para la imagen basado en time() y el nombre original de la imagen
            $image_name = time().$image->getClientOriginalName();
            // Seleccionamos el disco virtual users, extraemos el fichero de la carpeta temporal
            // donde se almacenó y guardamos la imagen recibida con el nombre generado
            Storage::disk('users')->put($image_name, File::get($image));
            $user->imagen = $image_name;
        }

        $user->name = $request->name;
        $user->apellidos = $request->apellidos;
        $user->email = $request->email;
        // $user->password = Hash::make($request->password);
        $user->telefono = $request->telefono;
        $user->direccion = $request->direccion;

        $user->save();

        return redirect()->route('config')->with(['status' => 'Configuración modificada con éxito']);
    }

    /**
     * Devuelve la imagen avatar del usuario.
     *
     * @param [type] $filename
     *
     * @return void
     */
    public function getImage($filename)
    {
        $file = Storage::disk('users')->get($filename);

        return new Response($file, 200);
    }

    public function profile($id)
    {
        $user = User::find($id);

        return view('user.profile', [
           'user' => $user,
        ]);
    }

    public function updatepass(Request $request)
    {
        $user = User::find(Auth::user()->id);

        $request->validate([
            'old_password' => 'required',
            'password' => 'required|string|confirmed|min:8',
        ]);

        if (Hash::check($request->old_password, $user->password)) {
            $user->password = Hash::make($request->password);
            $user->save();

            return redirect()->route('password')->with(['status' => 'Contraseña modificada con éxito']);
        } else {
            return redirect()->route('password')->with(['status' => 'La contraseña no era correcta']);
        }

        // $user->password = Hash::make($request->password);

        // $user->save();

        // return redirect()->route('password')->with(['status' => 'Configuración modificada con éxito']);
    }
}
