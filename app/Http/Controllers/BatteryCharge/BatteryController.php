<?php

namespace App\Http\Controllers\BatteryCharge;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BatteryCharge;
use App\vehicle_master;
use Session;

class BatteryController extends Controller
{
  
    public function index()
    {
        $fleet_code = session('fleet_code');
        $battery = BatteryCharge::where('fleet_code',$fleet_code)->get();
        return view('service_maintenace.batterycharge.show',compact('battery'));
    }
    
    public function create()
    {
        $fleet_code = session('fleet_code');
        $vehicle = vehicle_master::where('fleet_code',$fleet_code)->get();
        return view('service_maintenace.batterycharge.create',compact('vehicle'));
    }

    
    public function store(Request $request)
    {
        //
    }

   
    public function show($id)
    {
        //
    }

  
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

   
    public function destroy($id)
    {
        //
    }
}
