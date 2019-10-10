<?php

namespace App\Http\Controllers\Spare;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SpareType;
use App\Exports\SpareTypeExport;
use App\Imports\SpareTypeImport;
use Maatwebsite\Excel\Facades\Excel;

class SpareTypeController extends Controller
{
    
    public function index()
    {
        $fleet_code = session('fleet_code');
        $spare = SpareType::where('fleet_code',$fleet_code)->get();
        return view('spare.spare_type.show',compact('spare'));
    }

    public function create()
    {
        return view('spare.spare_type.create');
    }

    
    public function store(Request $request)
    {
        $data = $request->validate([ 'type_name'=>'required']);
        $data['type_name']  = strtoupper($request->type_name);
        $data['type_desc']  = $request->type_desc;
        $data['fleet_code'] = session('fleet_code');
        SpareType::create($data);
        return redirect('sparetype');
    }

  
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $fleet_code = session('fleet_code');
        $data = SpareType::find($id);
        return view('spare.spare_type.edit',compact('data'));
    }

    
    public function update(Request $request, $id)
    {
         $data = $request->validate([ 'type_name'=>'required']);
        $data['type_name']  = strtoupper($request->type_name);
        $data['type_desc']  = $request->type_desc;
        $data['fleet_code'] = session('fleet_code');
        SpareType::where('id',$id)->update($data);
        return redirect('sparetype');
    }

    public function destroy($id)
    {
        SpareType::where('id',$id)->delete();
        return redirect('sparetype');
    }


    public function export() 
    {
        return Excel::download(new SpareTypeExport, 'SpareType.xlsx');
    }

     public function import(Request $request) 
    {
        $data = Excel::import(new SpareTypeImport,request()->file('file'));
        
        return redirect('sparetype');
    }

    public function download() {
       $file_path = public_path('demo_files/Demo_SpareType.xlsx');
       return response()->download($file_path);
    }
}
