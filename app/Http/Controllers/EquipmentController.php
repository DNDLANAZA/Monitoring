<?php

namespace App\Http\Controllers;

use App\Models\Equipment;
use App\Http\Requests\StoreEquipmentRequest;
use App\Http\Requests\UpdateEquipmentRequest;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class EquipmentController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $equipments = Equipment::all();

        return view('admin.equipement.equipement', compact('equipments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teams = Team::all();

        return view('admin.equipement.newEquipement', compact('teams'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEquipmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $file = $request->file('picture');
        $fileName =  time() . '.' . $file->getClientOriginalExtension();
        $file->move('Gallery/Equipement', $fileName);

        $empData = [
            'name' => $request->name,
            'picture' => $fileName,
            'team_id' => $request->team_id,
            'date' => $request->date,
        ];

        Equipment::create($empData);

        return Redirect::to('equipment')->with( 'status', 'Equipment has created success👌😎!!' );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function show(Equipment $equipment)
    {
        return view('admin.equipement.viewEquipement', compact('equipment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipment $equipment)
    {
        $teams = Team::all();

        return view('admin.equipement.newEquipement', compact('equipment', 'teams'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEquipmentRequest  $request
     * @param  \App\Models\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $file = $request->file('picture');
        $fileName =  time() . '.' . $file->getClientOriginalExtension();
        $file->move('Gallery/Equipement', $fileName);

        $equipements = Equipment::find($id);
        $equipements->name = $request->name;
        $equipements->picture = $fileName;
        $equipements->date = $request->date;
        $equipements->team_id = $request->team_id;

        $equipements->save();

        return Redirect::to('equipment')->with( 'status', 'Updated Successfully👍👍!!' );

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Equipment  $equipment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipment $equipment)
    {
        $equipment->delete();

        return Redirect::to('equipment')->with( 'status', 'Deleted Successfully👍👍!!' );
    }
}
