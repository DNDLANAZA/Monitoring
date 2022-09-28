<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Maintenance;
use Illuminate\Http\Request;
use App\Http\Requests\StoreMaintenanceRequest;
use App\Http\Requests\UpdateMaintenanceRequest;
use App\Helpers\Helper;
use Illuminate\Support\Facades\Redirect;

class MaintenanceController extends Controller
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
        $maintenances = Maintenance::all();

        return view('admin.maintenance.maintenance', compact('maintenances'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teams = Team::all();

        return view('admin.maintenance.newMaintenance', compact('teams'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMaintenanceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('image');
        $fileName =  time() . '.' . $file->getClientOriginalExtension();
        $file->move('Gallery/Maintenance', $fileName);
        $leave_code = Helper::IDGenerator( new Maintenance, 'leave_code', 4, 'AMN' );
        $empData = [
            'site' => $request->site,
            'reference' => $request->reference,
            'status' => implode(',', $request->status),
            'diagnostique' => $request->diagnostique,
            'action' => $request->action,
            'image' => $fileName,
            'observation' => $request->observation,
            'comment' => $request->comment,
            'leave_code' =>$leave_code,
            'team_id' => $request->team_id,
            'date' => $request->date,
        ];

	    Maintenance::create($empData);

        return Redirect::to('maintenance')->with( 'status', 'Maintenance has created success 👌😎!!' );

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function show(Maintenance $maintenance)
    {
        return view('admin.maintenance.viewMaintenance', compact('maintenance'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function edit(Maintenance $maintenance)
    {
        $teams = Team::all();

        return view('admin.maintenance.editMaintenance', compact('maintenance', 'teams'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMaintenanceRequest  $request
     * @param  \App\Models\Maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $file = $request->file('image');
        $fileName =  time() . '.' . $file->getClientOriginalExtension();
        $file->move('Gallery/Maintenance', $fileName);

        $maintenance = Maintenance::find($id);
        $maintenance->site = $request->site;
        $maintenance->reference = $request->reference;
        $maintenance->status = implode(',', $request->status);
        $maintenance->diagnostique = $request->diagnostique;
        $maintenance->action = $request->action;
        $maintenance->image = $fileName;
        $maintenance->observation = $request->observation;
        $maintenance->comment = $request->comment;
        $maintenance->team_id = $request->team_id;
        $maintenance->date = $request->date;

        $maintenance->save();

        return Redirect::to('maintenance')->with( 'status', 'Updated Successfully👍👍!!' );
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Maintenance  $maintenance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Maintenance $maintenance)
    {
        $maintenance->delete();

        return Redirect::to('maintenance')->with( 'status', 'User created successfully 👌😎!!' );
    }
}
