<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB; 
use App\vch_comp;
use Session;

class VehiclemodelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $fleet_code = session('fleet_code');
        $model = DB::table('vch_model')->where('fleet_code',$fleet_code)->get();
        return view('vehicle_model.show',compact('model'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $fleet_code = session('fleet_code');
        $company  = vch_comp::where('fleet_code',$fleet_code)->get();
        
        return view('vehicle_model.create',compact('company'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fleet_code = session('fleet_code');
        $request->validate(['vehicle_company' => 'required',
                             'model_name'     => 'required'
                            ]);
    
        $vdata['vcompany_code'] = $request->vehicle_company;
        $vdata['model_name']    = $request->model_name;
        $vdata['model_desc']    = $request->model_desc;
        $vdata['fleet_code']    = $fleet_code;
    
        DB::table('vch_model')->insert($vdata);
        return redirect('vehicleModel');
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
        $company  = vch_comp::all();
        $model    =  DB::table('vch_model')->where('id',$id)->get();
        return view('vehicle_model.edit',compact('model','company'));
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
         $request->validate(['vehicle_company' => 'required',
                             'model_name'     => 'required'
                            ]);
    
        $vdata['vcompany_code'] = $request->vehicle_company;
        $vdata['model_name']    = $request->model_name;
        $vdata['model_desc']    = $request->model_desc;
    
        DB::table('vch_model')->where('id',$id)->update($vdata);
        return redirect('vehicleModel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('vch_model')->where('id',$id)->delete();
         return redirect('vehicleModel');
    }
}
