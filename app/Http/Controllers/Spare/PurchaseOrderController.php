<?php

namespace App\Http\Controllers\Spare;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SpareVendor;
use App\Models\SpareMaster;
use App\Models\SpareType;
use App\Models\MaterialRequest;
use App\Models\Inventory\MaterialItemRequest;
use Session;

class PurchaseOrderController extends Controller
{
    public function index()
    {
        $fleet_code = session('fleet_code');
        $request    = array();
        return view('spare.inventory.purchase_order.show',compact('request'));
    }
  
    public function create()
    {
        $fleet_code = session('fleet_code');
        $supplier   = SpareVendor::where('fleet_code',$fleet_code)->get();
        return view('spare.inventory.purchase_order.create',compact('supplier'));
    }

    public function store(Request $request)
    {
       dd($request);
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
    public function show_model(Request $request){
        $fleet_code = session('fleet_code');
        $type       = SpareType::where('fleet_code',$fleet_code)->get();
        $suppliers  = array();
        return view('spare.inventory.purchase_order.models.material_model',compact('type'));
    }

     public function get_type_rec(Request $request){
        $id    = $request->id;
        $mater = SpareMaster::where('type_id',$id)->get();
        return view('spare.inventory.material_request.spare_table',compact('mater'));
    }

    public function get_mtr_no(){
        $fleet_code = session('fleet_code');
        $data       = MaterialRequest::where('fleet_code',$fleet_code)->get(); ?>
        <option>Select..</option>
    <?php   foreach ($data as $Data) { ?>
                <option value="<?php echo $Data->id ; ?>"><?php echo $Data->mtr_no; ?></option>
    <?php   } 
    }    

    public function get_mtr_list(Request $request){
        $id   = $request->id;
        $data = MaterialItemRequest::where('request_id',$id)->get();
        return view('spare.inventory.purchase_order.po_item_table',compact('data')); 
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
                $data1['part_no'] = $data->part_no;
                session()->push('data.'.$data->id, $data1);
            }
        }
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
