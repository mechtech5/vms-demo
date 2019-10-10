<?php

namespace App\Http\Controllers\Tyre;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Exports\TyreModelExport;
use App\Imports\TyreModelImport;
use Maatwebsite\Excel\Facades\Excel;
use Session;
use App\Models\TyreModel;
use App\Models\TyreCompany;

class TyreModelController extends Controller
{
    
    public function index()
    {
        $fleet_code = session('fleet_code');
        $model      = TyreModel::where('fleet_code',$fleet_code)->get();
        return view('tyre.tyremodel.show',compact('model'));
        
    }

    public function create()
    {
        $fleet_code = session('fleet_code');
        $company = TyreCompany::where('fleet_code',$fleet_code)->get();
        return view('tyre.tyremodel.create',compact('company'));
    }

    
    public function store(Request $request)
    {
        $data = $request->validate(['comp_id'   =>'required|not_in:0',
                                    'model_name'=>'required'     
                                    ]);
        $data['fleet_code'] = session('fleet_code');
        $data['model_desc'] = $request->model_desc;
        TyreModel::create($data);
        return redirect('tyremodel');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $data = TyreModel::find($id);
        $fleet_code = session('fleet_code');
        $company = TyreCompany::where('fleet_code',$fleet_code)->get();
        return view('tyre.tyremodel.edit',compact('company','data'));
    }

    
    public function update(Request $request, $id)
    {
       $data = $request->validate(['comp_id'   =>'required',
                                    'model_name'=>'required'     
                                    ]);
        $data['fleet_code'] = session('fleet_code');
        $data['model_desc'] = $request->model_desc;
        TyreModel::where('id',$id)->update($data);
        return redirect('tyremodel');
    }

    
    public function destroy($id)
    {
       TyreModel::where('id',$id)->delete();
       return redirect('tyremodel');
    }

     public function export() 
    {
        return Excel::download(new TyreModelExport, 'TyreModel.xlsx');
    }

     public function import(Request $request) 
    {
        $data = Excel::import(new TyreModelImport,request()->file('file'));
        
        return redirect('tyremodel');
    }

    public function download() {
       $file_path = public_path('demo_files/Demo_SpareMaster.xlsx');
       return response()->download($file_path);
    }
}
