<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\master_state;
use App\City;
use DB;
use Session;

class CityController extends Controller
{
  
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {   
        $fleet_code = session('fleet_code');
        $city = DB::table('master_cities')->where('fleet_code',$fleet_code)->get();
        return view('city.show',compact ('city'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
        $state = Master_state::all();
        return view('city.create',compact('state'));
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
       $validatedData = $request->validate([
                                       'state_id' =>'required',
                                       'city_name'=> 'required',
                                       'city_code' => 'required'
                                       ]);
       $validatedData['city_name'] =  ucwords($request->city_name);
       $validatedData['city_code'] = strtoupper($request->city_code); 
       $validatedData['fleet_code'] = $fleet_code;   
        
        DB::table('master_cities')->insert($validatedData);
    
         return redirect('city');
     }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $data = DB::table('master_cities')->where('id',$id)->get();
        $state = master_state::all();
        
        return view('city.edit',compact("data",'state'));
    }

   
    public function update(Request $request, $id)
    {
      
        $validatedData = $request->validate([
                                       'state_id' =>'required',
                                       'city_name'=> 'required|alpha',
                                       'city_code' => 'required|alpha'                                  
                                    ]);
       $validatedData['city_name']  =  ucwords($request->city_name);
       $validatedData['city_code'] = strtoupper($request->city_code);    
        
       DB::table('master_cities')->where('id',$id)->update($validatedData);
       return redirect('city');
    }

    
    public function destroy($id)
    {
       DB::table('master_cities')->where('id',$id)->delete();
        return redirect('city');
    }
}
