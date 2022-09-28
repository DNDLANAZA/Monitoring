<?php

namespace App\Http\Controllers;

use App\Models\Maintenance;
use Illuminate\Http\Request;

class LeaveCodeController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth');
    }
    
    public function index()
    {
        $maintenances = Maintenance::all();

        return view('admin.leavecode.leaveCode', compact('maintenances'));
    }
}
