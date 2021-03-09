<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Tramo;
use App\Models\TramoUser;
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

        $tramxus = TramoUser::where('user_id', $iduser)->paginate(5);
        $tramos = Tramo::all();
        // // $tramos = Tramo::all();
        // $tramxus = User::find($iduser)->tramos;

        $activities = Activity::All();

        return view('mistramos.index', compact('tramos', 'tramxus', 'activities'));
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
        $ocupado = false;
        $tramos = TramoUser::All();
        // $idact = $request->idact;
        // $idtramo =
        foreach ($tramos as $tramo) {
            if ($request->idtramo == $tramo->tramo_id && Auth::user()->id == $tramo->user_id) {
                $ocupado = true;
            }
        }
        if (!$ocupado) {
            // $tr = new TramoUser();
            // $tr->user_id =
            // $tr->tramo_id = $request->idtramo;

            TramoUser::create([
                'user_id' => Auth::user()->id,
                'tramo_id' => $request->idtramo,
            ]);
            // // $tramos = Tramo::all();
            // $tramxus = User::find($iduser);

            // $tramxus->user_id = Auth::user()->id;
            // $tramxus->tramo_id = $request->idtramo;

            // $tr->save();

            return redirect()->route('mistramos.index')->with(['status' => 'Reserva añadida con éxito']);
        } else {
            return redirect()->route('mistramos.index')->with(['status' => 'La reserva ya existe']);
        }
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
    public function destroy(TramoUser $t)
    {
        $t->delete();

        return redirect()->route('mistramos.index')->with(['status' => 'Reserva borrada con éxito']);
    }
}
