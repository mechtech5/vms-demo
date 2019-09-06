<?php

namespace App\Http\Controllers\Tyre;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\TyreType;
use App\Exports\TyreTypeExport;
use App\Imports\TyreTypeImport;
use Maatwebsite\Excel\Facades\Excel;

class TyreTypeController extends Controller
{
    public function index()
    {
        $fleet_code = session('fleet_code');
        $tyre = TyreType::where('fleet_code',$fleet_code)->get();
        return view('tyre.tyre_type.show',compact('tyre'));
    }

    public function create()
    {
        return view('tyre.tyre_type.create');
    }

    
    public function store(Request $request)
    {
        $data = $request->validate([ 'type_name'=>'required']);
        $data['type_name']  = strtoupper($request->type_name);
        $data['type_desc']  = $request->type_desc;
        $data['fleet_code'] = session('fleet_code');
        TyreType::create($data);
        return redirect('tyretype');
    }

  
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $fleet_code = session('fleet_code');
        $data = TyreType::find($id);
        return view('tyre.tyre_type.edit',compact('data'));
    }

    
    public function update(Request $request, $id)
    {
         $data = $request->validate([ 'type_name'=>'required']);
        $data['type_name']  = strtoupper($request->type_name);
        $data['type_desc']  = $request->type_desc;
        $data['fleet_code'] = session('fleet_code');
        TyreType::where('id',$id)->update($data);
        return redirect('typetype');
    }

    public function destroy($id)
    {
        TyreType::where('id',$id)->delete();
        return redirect()->back();
    }


    public function export() 
    {
        return Excel::download(new TyreTypeExport, 'TypeType.xlsx');
    }

     public function import(Request $request) 
    {
        $data = Excel::import(new TyreTypeImport,request()->file('file'));
        
        return redirect()->back();
    }

    public function download() {
       $file_path = public_path('demo_files/Demo_TyreType.xlsx');
       return response()->download($file_path);
    }
}
