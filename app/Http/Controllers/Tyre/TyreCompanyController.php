<?php

namespace App\Http\Controllers\Tyre;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\Exports\TyreCompanyExport;
use App\Imports\TyreCompanyImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\TyreCompany;

class TyreCompanyController extends Controller
{
  
    public function index()
    {
        $fleet_code = session('fleet_code');
        $tyre = TyreCompany::where('fleet_code',$fleet_code)->get();

        return view('tyre.tyrecompany.show',compact('tyre'));
    }

    public function create()
    {
        return view('tyre.tyrecompany.create');
    }

  
    public function store(Request $request)
    {
        $data = $request->validate(['comp_name'=>'required']);

        $data['comp_desc']  = $request->comp_desc;
        $data['fleet_code'] = session('fleet_code');
        TyreCompany::create($data);
        return redirect('tyrecompany');
    }

   
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        $data = TyreCompany::find($id);
        return view('tyre.tyrecompany.edit',compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate(['comp_name'=>'required']);

        $data['comp_desc']  = $request->comp_desc;
        $data['fleet_code'] = session('fleet_code');
        TyreCompany::where('id',$id)->update($data);
        return redirect('tyrecompany');
    }

    
    public function destroy($id)
    {
        TyreCompany::where('id',$id)->delete();
        return redirect('tyrecompany');
    }

    public function export() 
    {
        return Excel::download(new TyreCompanyExport, 'Demo_TyreCompany.xlsx');
    }

     public function import(Request $request) 
    {
        $data = Excel::import(new TyreCompanyImport,request()->file('file'));
        
        return redirect('tyrecompany');
    }

    public function download() {
       $file_path = public_path('demo_files/Demo_SpareMaster.xlsx');
       return response()->download($file_path);
    }
}
