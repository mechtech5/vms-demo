<?php

namespace App\Http\Controllers\Painting;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painting;
use Session;
use App\vehicle_master;
use App\Exports\PaintingExport;
use App\Imports\PaintingImport;
use Maatwebsite\Excel\Facades\Excel;
use Auth;

class PaintingController extends Controller
{
   public function index()
    {
        $fleet_code = session('fleet_code');
        $painting = Painting::where('fleet_code',$fleet_code)->get();
        return view('service_maintenace.painting.show',compact('painting'));
    }

    public function create()
    {
        $fleet_code = session('fleet_code');
        $vehicle    = vehicle_master::where('fleet_code',$fleet_code)->get();
        return view('service_maintenace.painting.create',compact('vehicle'));
    }
    public function store(Request $request)
    {
        $data  = $request->validate([
                                      "vch_id" => "required",
                                      "km_reading" => 'required|numeric',
                                      "cabin_color" => 'required|alpha',
                                      "body_colo" => 'required|alpha',
                                      "interior_color" => 'required|alpha',
                                      "chasis_color" => 'required|alpha',
                                      "cost" => 'required|numeric',
                                      "date" => 'required|date|date_format:Y-m-d|before:tomorrow'
                                    ]);
        $data['fleet_code'] = session('fleet_code');
        $data['remarks']    = $request->remarks;
        $data['created_by'] = Auth::user()->id;
        Painting::create($data);
        return redirect('painting');
    }
    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        $fleet_code = session('fleet_code');
        $vehicle    = vehicle_master::where('fleet_code',$fleet_code)->get();
        $data = Painting::find($id);
        return view('service_maintenace.painting.edit',compact('data','vehicle'));
    }

    public function update(Request $request, $id)
    {
        $data  = $request->validate([
                                      "vch_id" => "required",
                                      "km_reading" => 'required|numeric',
                                      "cabin_color" => 'required|alpha',
                                      "body_colo" => 'required|alpha',
                                      "interior_color" => 'required|alpha',
                                      "chasis_color" => 'required|alpha',
                                      "cost" => 'required|numeric',
                                      "date" => 'required|date|date_format:Y-m-d|before:tomorrow'
                                    ]);
        $data['fleet_code'] = session('fleet_code');
        $data['remarks']    = $request->remarks;
        $data['created_by'] = Auth::user()->id;
        Painting::where('id',$id)->update($data);
        return redirect('painting');
    }

    public function destroy($id)
    {
        Painting::where('id',$id)->delete();
        return redirect('painting');
    }

     public function export() 
    {
        return Excel::download(new PaintingExport, 'Painting.xlsx');
    }

     public function import(Request $request) 
    {
        $data = Excel::import(new PaintingImport,request()->file('file'));
        
        return redirect('painting');
    }
    public function download() {
       $file_path = public_path('demo_files/Painting .xlsx');
    return response()->download($file_path);
    }
}
