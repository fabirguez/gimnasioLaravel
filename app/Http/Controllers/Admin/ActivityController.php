<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Http\Request;

// public function index(Request $request)
//     {
//         $buscadia = $request->buscadia;
//         $buscaactividad = $request->buscaactividad;
//         if ($buscadia == '' && $buscaactividad == '') {
//             $tramos = Tramo::paginate(5);
//             $activities = Activity::all();
//         } elseif ($buscadia != '' && $buscaactividad == '') {
//             $tramos = Tramo::where('dia', 'LIKE', "%$buscadia%")->paginate(5);
//             $activities = Activity::all();
//         } elseif ($buscadia == '' && $buscaactividad != '') {
//             $tramos = Tramo::where('actividad_id', 'LIKE', "%$buscaactividad%")->paginate(5);
//             $activities = Activity::all();
//         } else {
//             $tramos = Tramo::where('actividad_id', 'LIKE', "%$buscaactividad%")
//                             ->where('dia', 'LIKE', "%$buscadia%")->paginate(5);
//             $activities = Activity::all();
//         }
class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $buscaname = $request->buscaname;
        $ordenaaforo = $request->ordenaaforo;

        if ($buscaname == '' && $ordenaaforo == '') {
            $activities = Activity::paginate(5);
        } elseif ($buscaname != '' && $ordenaaforo == '') {
            $activities = Activity::where('nombre', 'LIKE', "%$buscaname%")->paginate(5);
        } elseif ($buscaname == '' && $ordenaaforo != '') {
            if ($ordenaaforo == 'menor') {
                $activities = Activity::orderBy('aforo', 'asc')->paginate(5);
            } else {
                $activities = Activity::orderBy('aforo', 'desc')->paginate(5);
            }
        } else {
            if ($ordenaaforo == 'menor') {
                $activities = Activity::where('nombre', 'LIKE', "%$buscaname%")->orderBy('aforo', 'asc')->paginate(5);
            } else {
                $activities = Activity::where('nombre', 'LIKE', "%$buscaname%")->orderBy('aforo', 'desc')->paginate(5);
            }
        }

        // $activities = Activity::orderBy('aforo')->paginate(4);

        return view('admin.activities.index', compact('activities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.activities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:activities',
            'descripcion' => 'required|string|max:255',
            'aforo' => 'required|integer',
        ]);

        Activity::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'aforo' => $request->aforo,
        ]);

        return redirect()->route('admin.activities.index')->with(['status' => 'Actividad agregada con éxito']);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Activity $activity)
    {
        return view('admin.activities.show', compact('activity'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Activity $activity)
    {
        return view('admin.activities.edit', compact('activity'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Activity $activity, Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255|unique:activities,nombre,'.$activity->id,
            'descripcion' => 'required|string|max:255',
            'aforo' => 'required|integer',
            ]);
        $activity->nombre = $request->nombre;
        $activity->descripcion = $request->descripcion;
        $activity->aforo = $request->aforo;

        $activity->save();

        return redirect()->route('admin.activities.index')->with(['status' => 'Actividad actualizada con éxito']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activity $activity)
    {
        $activity->delete();

        return redirect()->route('admin.activities.index')->with(['status' => 'Actividad borrada con éxito']);
    }
}
