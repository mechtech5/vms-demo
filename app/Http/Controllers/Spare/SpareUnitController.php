<?php

namespace App\Http\Controllers\Spare;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SpareUnit;
use Session;
use App\Exports\SpareUnitExport;
use App\Imports\SpareUnitImport;
use Maatwebsite\Excel\Facades\Excel;
use Auth;

class SpareUnitController extends Controller
{
    
    public function index()
    {
        $fleet_code = session('fleet_code');
        $spareunit  = SpareUnit::where('fleet_code',$fleet_code)->get();
        return view('spare.spare_unit.show',compact('spareunit'));
    }

   
    public function create()
    {
        return view('spare.spare_unit.create');
    }

    
    public function store(Request $request)
    {
        $data = $request->validate(['unit_name'=>'required']);

        $data['unit_name']  = strtoupper($request->unit_name);
        $data['fleet_code'] = session('fleet_code');
        $data['unit_desc']  = $request->unit_desc;
        $data['created_by']  = Auth::user()->id;
        SpareUnit::create($data);
        return redirect('spareunit');
    }

    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $data = SpareUnit::find($id);
        return view('spare.spare_unit.edit',compact('data'));
    }

   
    public function update(Request $request, $id)
    {
         $data = $request->validate(['unit_name'=>'required']);

        $data['unit_name']  = strtoupper($request->unit_name);
        $data['fleet_code'] = session('fleet_code');
        $data['unit_desc']  = $request->unit_desc;
        SpareUnit::where('id',$id)->update($data);
        return redirect('spareunit');
    }

    
    public function destroy($id)
    {
        SpareUnit::where('id',$id)->delete();
        return redirect('spareunit');
    }

    public function export() 
    {
        return Excel::download(new SpareUnitExport, 'SpareUnit.xlsx');
    }

     public function import(Request $request) 
    {
        $data = Excel::import(new SpareUnitImport,request()->file('file'));
        
        return redirect('spareunit');
    }

    public function download() {
       $file_path = public_path('demo_files/Demo_SpareUnit.xlsx');
       return response()->download($file_path);
    }
}
