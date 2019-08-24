<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
class StateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $fleet_code = session('fleet_code');
        $state = DB::table('master_states')->where('fleet_code',$fleet_code)->get();
        return view('state.show',compact('state'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('state.create');
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

        $data = array();
        $this->validate($request,['state'=>'required',
                                  'state_short' => 'required' 
                                ]);

       $data['state_name'] = ucwords($request->state);
       $data['state_code'] = strtoupper($request->state_short);
       $data['fleet_code'] = $fleet_code;
       

       DB::table('master_states')->insert($data);
       return redirect('state');
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
        $data = DB::table('master_states')->where('id',$id)->get();
        return view('state.edit',compact('data'));
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
        $data = array();
        $this->validate($request,['state'=>'required',
                                  'state_short' => 'required' 
                                ]);

       $data['state_name'] = ucwords($request->state);
       $data['state_code'] = strtoupper($request->state_short);
       
       DB::table('master_states')->where('id',$id)->update($data);
       return redirect('state');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('master_states')->where('id',$id)->delete();
        return redirect('state');
    }
}
