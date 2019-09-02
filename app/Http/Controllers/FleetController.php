<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;

class FleetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        $fleet = DB::table('fleet_mast')->get();
       
        return view('fleet.show',compact('user','fleet'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user  = User::all();
        return view('fleet.create',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
                                       'fleet_owner' =>'required',
                                       'fleet_name'=> 'required',
                                       'fleet_code' => 'required|min:2|max:8'
                                       ]);
       
        $validatedData['fleet_desc'] = $request->fleet_desc;

        DB::table('fleet_mast')->insert($validatedData);
        return redirect('fleet');

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
        $fleet = DB::table('fleet_mast')->where('fleet_owner',$id)->get();
        $user = User::all();
        return view('fleet.edit',compact('fleet','user'));
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
        $validatedData = $request->validate([
                                       'fleet_owner' =>'required',
                                       'fleet_name'=> 'required',
                                       'fleet_code' => 'required'
                                       ]);
       
        $validatedData['fleet_desc'] = $request->fleet_desc;

        DB::table('fleet_mast')->where('fleet_owner',$id)->update($validatedData);
        return redirect('fleet');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('fleet_mast')->where('fleet_owner',$id)->delete();
        return redirect('fleet');
    }
}
