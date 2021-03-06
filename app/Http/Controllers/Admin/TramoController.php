<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\Tramo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TramoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $buscadia = $request->buscadia;
        $buscaactividad = $request->buscaactividad;
        if ($buscadia == '' && $buscaactividad == '') {
            $tramos = Tramo::paginate(5);
            $activities = Activity::all();
        } elseif ($buscadia != '' && $buscaactividad == '') {
            $tramos = Tramo::where('dia', 'LIKE', "%$buscadia%")->paginate(5);
            $activities = Activity::all();
        } elseif ($buscadia == '' && $buscaactividad != '') {
            $tramos = Tramo::where('actividad_id', 'LIKE', "%$buscaactividad%")->paginate(5);
            $activities = Activity::all();
        } else {
            $tramos = Tramo::where('actividad_id', 'LIKE', "%$buscaactividad%")
                            ->where('dia', 'LIKE', "%$buscadia%")->paginate(5);
            $activities = Activity::all();
        }

        // $horas = DB::statement('select * from tramos order by hora_inicio');

        return view('admin.tramos.index', compact('tramos', 'activities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $activities = Activity::all();

        return view('admin.tramos.create', compact('activities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tramos = Tramo::All();
        $ocupado = false;
        $request->validate([
            'dia' => 'required|string|max:255',
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin' => 'required|date_format:H:i|after:hora_inicio',
            'actividad_id' => 'required|integer',
            'fecha_alta' => 'required|date_format:Y-m-d',
            'fecha_baja' => 'required|date_format:Y-m-d',
        ]);

        // if () {
        // } else {

        foreach ($tramos as $tramo) {
            if ($tramo->hora_inicio <= $request->hora_inicio && $tramo->hora_fin >= $request->hora_fin && $tramo->dia == $request->dia) {
                $ocupado = true;
            }
            // elseif ($tramo->hora_inicio > $request->hora_inicio && $tramo->hora_fin >= $request->hora_fin && $tramo->dia == $request->dia) {
            //     $ocupado = true;
            // } elseif ($tramo->hora_inicio <= $request->hora_inicio && $tramo->hora_fin <= $request->hora_fin && $tramo->dia == $request->dia) {
            //     $ocupado = true;
            // } elseif ($tramo->hora_inicio < $request->hora_inicio && $tramo->hora_fin < $request->hora_fin && $tramo->dia == $request->dia) {
            //     $ocupado = false;
            // }
        }//no funciona bien, solo mira si no está dentro de las horas

        if (!$ocupado) {
            Tramo::create([
            'dia' => $request->dia,
            'hora_inicio' => $request->hora_inicio,
            'hora_fin' => $request->hora_fin,
            'actividad_id' => $request->actividad_id,
            'fecha_alta' => $request->fecha_alta,
            'fecha_baja' => $request->fecha_baja,
        ]);

            return redirect()->route('admin.tramos.index')->with(['status' => 'Tramo agregado con éxito']);
        }

        return redirect()->route('admin.tramos.create')->with(['status' => 'Tramo ocupado']);
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Tramo $tramo)
    {
        return view('admin.tramos.show', compact('tramo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(Tramo $tramo)
    {
        return view('admin.tramos.edit', compact('tramo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tramo $tramo)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tramo $tramo)
    {
        $tramo->delete();

        return redirect()->route('admin.tramos.index')->with(['status' => 'Tramo borrado con éxito']);
    }
}
