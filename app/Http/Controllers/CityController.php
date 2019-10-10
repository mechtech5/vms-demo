<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\master_state;
use App\City;
use Session;
use App\Exports\CityExport;
use App\Imports\CityImport;
use Maatwebsite\Excel\Facades\Excel;
use Auth;

class CityController extends Controller
{
  
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {   
        $fleet_code = session('fleet_code');
        $city = City::where('fleet_code',$fleet_code)->get();
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
                                       'state_id' =>'required|not_in:0',
                                       'city_name'=> 'required|string|regex:/^[\pL\s\-]+$/u',
                                       'city_code' => 'required|max:3'
                                       ]);
       $validatedData['city_name']  =  ucwords($request->city_name);
       $validatedData['city_code']  = strtoupper($request->city_code); 
       $validatedData['fleet_code'] = $fleet_code;   
       $validatedData['created_by'] = Auth::user()->id;
        
        City::create($validatedData);
    
         return redirect('city');
     }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $data = City::where('id',$id)->get();
        $state = master_state::all();
        
        return view('city.edit',compact("data",'state'));
    }

   
    public function update(Request $request, $id)
    {
      
        $validatedData = $request->validate([
                                       'state_id' =>'required',
                                       'city_name'=> 'required|regex:/^[\pL\s\-]+$/u',
                                       'city_code' => 'required|max:3'                                  
                                    ]);
       $validatedData['city_name']  =  ucwords($request->city_name);
       $validatedData['city_code']  = strtoupper($request->city_code);    
       $validatedData['created_by'] = Auth::user()->id;
        
       City::where('id',$id)->update($validatedData);
       return redirect('city');
    }

    
    public function destroy($id)
    {
      City::where('id',$id)->delete();
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
       $file_path = public_path('demo_files/Demo_City.xlsx');
       return response()->download($file_path);
    }
}
