<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Session;
use App\Exports\VehicleExport;
use App\Imports\VehicleImport;
use Maatwebsite\Excel\Facades\Excel;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fleet_code = session('fleet_code');
        $vehicle = DB::table('vch_comps')->where('fleet_code',$fleet_code)->get();
        return view('vehicle.show',compact('vehicle'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vehicle.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['company_description' => 'required|']);
        
        $fleet_code = session('fleet_code');
        $vdata['comp_name'] = $request->vehicle_company;
        $vdata['comp_desc'] = $request->company_description;
        $vdata['fleet_code'] = $fleet_code;
        
        DB::table('vch_comps')->insert($vdata);
        return redirect('vehicle');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vehicle = DB::table('vch_comps')->where('id',$id)->get();
        return view('vehicle.edit',compact('vehicle'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate(['company_description' => 'required']);
    
        $vdata['comp_name'] = $request->vehicle_company;
        $vdata['comp_desc'] = $request->company_description;
    
        DB::table('vch_comps')->where('id',$id)->update($vdata);
        return redirect('vehicle');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('vch_comps')->where('id',$id)->delete();
        DB::table('vch_model')->where('vcompany_code',$id)->delete();
        return redirect('vehicle');
    }

    public function export() 
    {
        return Excel::download(new VehicleExport, 'vehicle.xlsx');
    }

     public function import(Request $request) 
    {
        $data = Excel::import(new VehicleImport,request()->file('file'));
        
        return redirect('vehice');
    }
}
