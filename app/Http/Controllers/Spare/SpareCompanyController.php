<?php

namespace App\Http\Controllers\Spare;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\Exports\SpareCompanyExport;
use App\Imports\SpareCompanyImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\SpareCompany;

class SpareCompanyController extends Controller
{
    public function index()
    {
        $fleet_code = session('fleet_code');
        $company    = SpareCompany::where('fleet_code',$fleet_code)->get();
        return view('spare.spare_company.show',compact('company'));
    }

   
    public function create()
    {
        return view('spare.spare_company.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate(['comp_name'=>'required']);

        $data['comp_desc']  = $request->comp_desc;
        $data['fleet_code'] = session('fleet_code');
        SpareCompany::create($data);
        return redirect('sparecompany');   
    }

    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $fleet_code = session('fleet_code');
        $data = SpareCompany::find($id);
        return view('spare.spare_company.edit',compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate(['comp_name'=>'required']);

        $data['comp_desc']  = $request->comp_desc;
        $data['fleet_code'] = session('fleet_code');
        SpareCompany::create($data);
        return redirect('sparecompany'); 
    }

    
    public function destroy($id)
    {
        SpareCompany::where('id',$id)->delete();
        return redirect('sparecompany');    
    }

    public function export() 
    {
        return Excel::download(new SpareCompanyExport, 'SpareCompany.xlsx');
    }

     public function import(Request $request) 
    {
        $data = Excel::import(new SpareCompanyImport,request()->file('file'));
        
        return redirect('sparecompany');
    }

    public function download() {
       $file_path = public_path('demo_files/Demo_SpareCompany.xlsx');
       return response()->download($file_path);
    }
}
