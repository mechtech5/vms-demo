<?php

namespace App\Http\Controllers\Fuel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Exports\FuelEntryExport;
use App\Imports\FuelEntryImport;
use Maatwebsite\Excel\Facades\Excel;
use Session;
use App\Models\FuelBill;

class FuelBillController extends Controller
{
  
    public function index()
    {
        $fleet_code = session('fleet_code');
        $fuelbill = FuelBill::where('fleet_code',$fleet_code)->get();
        return view('fuel.fuelbill.show',compact('fuelbill'));
    }

   
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        //
    }

  
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }

    public function export() 
    {
        return Excel::download(new FuelEntryExport, 'FuelEntry.xlsx');
    }

     public function import(Request $request) 
    {
        $data = Excel::import(new FuelEntryImport,request()->file('file'));
        
        return redirect('fuelentry');
    }

    public function download() {
       $file_path = public_path('demo_files/Demo_Kmupdate.xlsx');
    return response()->download($file_path);
    }
}
