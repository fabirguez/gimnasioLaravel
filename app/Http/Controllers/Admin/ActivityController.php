<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activities = Activity::orderBy('aforo')->paginate(4);

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
