<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Tramo;
use App\Models\Tramo_user;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Tramo_userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $iduser = Auth::user()->id;

        // $tramos = Tramo::all();
        $tramxus = User::find($iduser)->tramos;

        $activities = Activity::All();

        return view('mistramos.index', compact('tramxus', 'activities'));
    }

    public function list()
    {
        return view('mistramos.list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $idact = $request->idact;
        // $idtramo =

        // $iduser = Auth::user()->id;

        // // $tramos = Tramo::all();
        // $tramxus = User::find($iduser)->tramos;

        // $activities = Activity::All();

        $modelo = new Tramo_user();
        $modelo->user_id = Auth::user()->id;
        $modelo->tramo_id = $request->idtramo;

        $modelo->save();

        return redirect()->route('mistramos.index')->with(['status' => 'Reserva añadida con éxito']);
        // return view('mistramos.index', compact('tramxus', 'activities'));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tramo $t)
    {
        $iduser = Auth::user()->id;

        User::find($iduser)->$t->id->delete();

        return redirect()->route('mistramos.index')->with(['status' => 'Reserva borrada con éxito']);
    }
}
