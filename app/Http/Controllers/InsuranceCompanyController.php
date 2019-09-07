<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\InsuranceCompany;
use App\Exports\InsurancExport;
use App\Imports\InsurancImport;
use Maatwebsite\Excel\Facades\Excel;

class InsuranceCompanyController extends Controller
{
    
    public function index()
    {
        $fleet_code = session('fleet_code');
        $company = InsuranceCompany::where('fleet_code',$fleet_code)->get();
        return view('insurance_company.show',compact('company'));
    }

    
    public function create()
    {
        return view('insurance_company.create');
    }

  
    public function store(Request $request)
    {
        $data  = $request->validate(["comp_name"    => 'required',
                                      "comp_phone"   => 'required',
                                      "comp_email"  => 'required|numeric',
                                      "comp_email"  => 'required|email|unique:agent_mast,agent_email',
                                      "comp_addr"=> 'required'
                                    ]);
        $data['fleet_code'] = session('fleet_code');
        InsuranceCompany::create($data);
        return redirect('company');
    }

    
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = InsuranceCompany::find($id);
        return view('insurance_company.edit',compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data  = $request->validate(["comp_name"    => 'required',
                                      "comp_phone"   => 'required|string|min:9|max:10',
                                      "comp_email"  => 'required|numeric',
                                      "comp_email"  => 'required|email|unique:agent_mast,agent_email',
                                      "comp_addr"=> 'required'
                                    ]);
        $data['fleet_code'] = session('fleet_code');
        InsuranceCompany::where('id',$id)->update($data);
        return redirect('company');
    }

    
    public function destroy($id)
    {
        InsuranceCompany::where('id',$id)->delete();
        return redirect('company');
    }

    public function export() 
    {
        return Excel::download(new InsurancExport, 'InsuranceCompany.xlsx');
    }

     public function import(Request $request) 
    {
        $data = Excel::import(new InsurancImport,request()->file('file'));
        
        return redirect('comapny');
    }
    public function download() {
        $file_path = public_path('demo_files/Demo_agent.xlsx');
        return response()->download($file_path);
    }
}
