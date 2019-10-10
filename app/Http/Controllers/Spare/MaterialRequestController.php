<?php

namespace App\Http\Controllers\Spare;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MaterialRequest;
use App\Exports\MaterialRequestExport;
use App\Imports\MaterialRequestImport;
use Maatwebsite\Excel\Facades\Excel;
use Session;
use App\Models\SpareMaster;
use App\Models\SpareType; 
use App\Models\Inventory\MaterialItemRequest;
use Auth;

class MaterialRequestController extends Controller
{
    public function index()
    {
       Session::forget('data');
       Session::forget('ids'); 
    
        $fleet_code = session('fleet_code');
        $request    = MaterialRequest::where('fleet_code',$fleet_code)->get();
        return view('spare.inventory.material_request.show',compact('request'));
    }

    public function create()
    {
        $data = array();
        $fleet_code = session('fleet_code');
        $type       = SpareType::where('fleet_code',$fleet_code)->get();
        return view('spare.inventory.material_request.create',compact('type','data'));
    }

    public function store(Request $request)
    {
        $data1 = $request->validate(['mtr_no'=>'required|numeric','mtr_date'=>'required','prep_by'=>'required|string']);

        $data1['fleet_code'] = session('fleet_code');
        $data1['remarks']    = $request->remarks;
        $data1['created_by'] = Auth::user()->id;
        $last_id = MaterialRequest::create($data1)->id;

        $ids     = !empty($request->id)?$request->id:array();
        $qty     = $request->qty;
        $remark  = $request->remark; 
        $count = count($ids);
        $x = 0;
        $data = array();
        $info = '';
        while($x < $count) {
            $data['request_id']=  $last_id ;
            $data['spare_id']  = $ids[$x];
            $data['quantity']  = $qty[$x]; 
            $data['remarks']   = $remark[$x];
            
            MaterialItemRequest::create($data);
             $x++; 
            $info = 'done'; 
         }
         if(!empty($info)){
            Session::forget('data');
            Session::forget('ids'); 
         }

         return redirect('material_request');
    }
   
    public function show(Request $request)
    { 
        
    }
    
    public function edit($id)
    {        
        $fleet_code = session('fleet_code');
        $data       = MaterialItemRequest::where('request_id',$id)->get();
        $type       = SpareType::where('fleet_code',$fleet_code)->get();
        $item_dtl   = MaterialRequest::where('id',$id)->first();

        $data1 = array();
        Session::forget('ids'); 
        Session::forget('data');
        foreach ($data as $Data) {
            $Id = $Data->id;            
            $spare = SpareMaster::find($Data->spare_id);            
            $data1['id']       = $spare->id;
            $data1['name']     = $spare->name;
            $data1['type_id']  = $spare->type_id;
            $data1['unit_id']  = $spare->unit_id;
            $data1['comp_id']  = $spare->comp_id;
            $data1['qty']      = $Data->quantity;
            $data1['remarks']  = $Data->remarks;
            $data1['not']      = 'not';
            $data1['readonly'] = 'readonly';

            session()->push('ids.'.$Id ,$Id);
            session()->push('data.'.$Data->id, $data1);
        }
          
        return view('spare.inventory.material_request.edit',compact('type','item_dtl'));
    }

    public function update(Request $request, $id)
    {
        $ids     = !empty($request->id)?$request->id:array();
        $qty     = $request->qty;
        $remark  = $request->remark; 
        $count = count($ids);
        $x = 0;
        $data = array();
        $info = '';
        while($x < $count) {
            $data['request_id']=  $id ;
            $data['spare_id']  = $ids[$x];
            $data['quantity']  = $qty[$x]; 
            $data['remarks']   = $remark[$x];
            
            MaterialItemRequest::create($data);
             $x++; 
            $info = 'done';            
         }
          if(!empty($info)){
            Session::forget('data');
            Session::forget('ids'); 
         }
        return redirect('material_request');
    }
   
    public function destroy($id)
    {
        MaterialRequest::where('id',$id)->delete();
        MaterialItemRequest::where('request_id',$id)->delete();
        return redirect('material_request');

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

    public function get_type_rec(Request $request){
        $id    = $request->id;
        $mater = SpareMaster::where('type_id',$id)->get();
        return view('spare.inventory.material_request.spare_table',compact('mater'));
    }

    public function save_in_session(Request $request){
        $id      = array_unique($request->id);
        $page    = $request->page;
        $data1   = array();
        $data    = array(); 
        $ids     = session('ids');
        $item_id = array();        

        if($page =='edit'){
            foreach ($ids as $Ids => $value) {
                $items     = MaterialItemRequest::where('id',$Ids)->first();
                if(empty($items)){
                }
                else{
                     $item_id[] = $items->spare_id;
                }           
               
            }
            foreach ($id as $Id) {                
                if(!in_array($Id, $item_id)){
                    Session::push('ids.'.$Id,$Id);
                    $data = SpareMaster::find($Id);
                    $data1['id']      = $data->id;
                    $data1['name']    = $data->name;
                    $data1['type_id'] = $data->type_id;
                    $data1['unit_id'] = $data->unit_id;
                    $data1['comp_id'] = $data->comp_id;
                    $data1['qty']     = '';
                    $data1['remarks'] = '';
                    $data1['not']      = 'not';
                    $data1['readonly'] = 'readonly';
                    session()->push('data.'.$data->id, $data1);  
                }               
            }
            return view('spare.inventory.material_request.spare_edit',compact('mater'));             
        }
        else{
            foreach ($id as $Id) {
                Session::push('ids.'.$Id,$Id);
                $data = SpareMaster::find($Id);
                $data1['id']      = $data->id;
                $data1['name']    = $data->name;
                $data1['type_id'] = $data->type_id;
                $data1['unit_id'] = $data->unit_id;
                $data1['comp_id'] = $data->comp_id;
                session()->push('data.'.$data->id, $data1);
            }
        }
    }

    public function show_model(Request $request){
        $fleet_code = session('fleet_code');
        $type       = SpareType::where('fleet_code',$fleet_code)->get();
        $suppliers  = array();
        return view('spare.inventory.models.material_model',compact('type'));
    }

    public function remove_session(Request $request){
        $id   = $request->id;
        $page = $request->page;
        $data = session('data');
        session::forget('data.'.$id);        
        Session::forget('ids.'.$id);
        if($page == 'edit'){                 
            return view('spare.inventory.material_request.spare_edit',compact('mater'));
         }            
    }
    
}
