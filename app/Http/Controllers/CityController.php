<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\master_state;
use App\City;
use DB;
use Session;
use App\Exports\CityExport;
use App\Imports\CityImport;
use Maatwebsite\Excel\Facades\Excel;

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


    public function create()
    {
        $fleet_code = session('fleet_code');       
        $state = master_state::where('fleet_code',$fleet_code)->get();
        return view('city.create',compact('state'));
    }

    public function store(Request $request)
    {      
      $fleet_code = session('fleet_code');
       $validatedData = $request->validate([
                                       'state_id' =>'required',
                                       'city_name'=> 'required',
                                       'city_code' => 'required|max:3'
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

    public function export() 
    {
        return Excel::download(new CityExport, 'City.xlsx');
    }

     public function import(Request $request) 
    {
        $data = Excel::import(new CityImport,request()->file('file'));
        
        return redirect()->back();
    }

    public function download() {
       $file_path = public_path('demo_files/Demo_State.xlsx');
       return response()->download($file_path);
    }
}
