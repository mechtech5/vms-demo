<?php

namespace App\Http\Controllers\Spare;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SpareVendor;
use App\Models\SpareMaster;
use App\Models\SpareType;
use App\Models\MaterialRequest;
use App\Models\Inventory\MaterialItemRequest;
use App\Models\Inventory\PurchaseOrder;
use App\Models\Inventory\PurchaseOrder_item;
use Session;

class PurchaseOrderController extends Controller
{
    public function index()
    {
        session::forget('data');        
        Session::forget('ids');
        Session::put('update','no');
        $fleet_code = session('fleet_code');
        $request    = PurchaseOrder::where('fleet_code',$fleet_code)->get();
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
       $data =  $request->validate([
            'qty.*'       =>'required|string',
            'rate.*'      =>'required|string',
            'disc_pct.*'  =>'required|string',
            'igst_pct.*'  =>'required|string',
            'cgst_pct.*'  =>'required|string',
            'sgst_pct.*'  =>'required|string',
            'amt.*'       =>'nullable',
            'disc_amt.*'  =>'nullable',
            'igst_amt.*'  =>'nullable',
            'cgst_amt.*'  =>'nullable',
            'sgst_amt.*'  =>'nullable',
            'net_amt.*'   => 'nullable|numeric',
            'po_no'       => 'required|numeric',
            'po_date'     => 'required|date',
            'vendor_code' => 'required|not_in:0',
            'mtr_no'      => 'nullable|not_in:0',
            'total_qty'   => 'nullable|numeric',
            'grand_total' => 'nullable|numeric',
            'totl_disc_amt'    => 'nullable|numeric',
            'totl_igst_amt'    => 'nullable|numeric',
            'totl_cgst_amt'    => 'nullable|numeric',
            'totl_sgst_amt'    => 'nullable|numeric',
            'totl_net_amt'     => 'nullable|numeric'
            ]);
      
       $po_data['fleet_code']  = session('fleet_code');
       $po_data['po_number']   = $data['po_no'];
       $po_data['po_date']     = $data['po_date'];
       $po_data['vendor_code'] = $data['vendor_code'];
       if($request->mtr_no !=0){
            $po_data['mtr_no'] = $data['mtr_no'];            
        }
       $po_data['total_qty']   = $data['total_qty'];
       $po_data['grand_total'] = $data['grand_total'];
       $po_data['disc_amt']    = $data['totl_disc_amt'];
       $po_data['igst_amt']    = $data['totl_igst_amt'];
       $po_data['cgst_amt']    = $data['totl_cgst_amt'];
       $po_data['sgst_amt']    = $data['totl_sgst_amt'];
       $po_data['net_amt']     = $data['totl_net_amt'];

       $po_id = PurchaseOrder::create($po_data)->id;

       $count = count($data['qty']);
       $x = 0;
       $id       = $request->id; 
       $qty      = $data['qty'];
       $rate     = $data['rate'];
       $disc_pct = $data['disc_pct'];
       $igst_pct = $data['igst_pct'];
       $cgst_pct = $data['cgst_pct'];
       $sgst_pct = $data['sgst_pct'];
       $amt      = $data['amt'];
       $disc_amt = $data['disc_amt'];
       $igst_amt = $data['igst_amt'];
       $cgst_amt = $data['cgst_amt'];
       $sgst_amt = $data['sgst_amt'];
       $net_amt  = $data['net_amt'];
       $status   = false;
       
       if($po_id){
            while($x < $count){
                $itm_data['spare_id']  = $id[$x];
                $itm_data['po_id']     = $po_id;
                $itm_data['qty']       = $qty[$x];
                $itm_data['rate']      = $rate[$x];
                $itm_data['disc_pct']  = $disc_pct[$x];
                $itm_data['igst_pct']  = $igst_pct[$x];
                $itm_data['cgst_pct']  = $cgst_pct[$x];
                $itm_data['sgst_pct']  = $sgst_pct[$x];
                $itm_data['disc_amt']  = $disc_amt[$x];
                $itm_data['igst_amt']  = $igst_amt[$x];
                $itm_data['cgst_amt']  = $cgst_amt[$x];
                $itm_data['sgst_amt']  = $sgst_amt[$x];
                $itm_data['amt']       = $amt[$x];
                $itm_data['net_amt']   = $net_amt[$x];
                PurchaseOrder_item::create($itm_data);
                $x++;
                $status = true;
           }
        }
        if($status){
            session::forget('data');        
            Session::forget('ids');
        }
        return redirect('purchase_order');  
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {   
        $fleet_code = session('fleet_code');
        $supplier   = SpareVendor::where('fleet_code',$fleet_code)->get();
        $po_data = PurchaseOrder::where('id',$id)->first();
        if(session('update') == 'yes'){
            return view('spare.inventory.purchase_order.edit',compact('supplier','po_data'));
        }        
        
        session::forget('data');        
        Session::forget('ids');        
        $po_item = PurchaseOrder_item::where('po_id',$po_data->id)->get();
        foreach ($po_item as $Data) {  
            $item = SpareMaster::find($Data->spare_id);
            Session::push('ids.'.$Data->id,$Data->id);
            $data1['id']       = $item->id;
            $data1['name']     = $item->name;
            $data1['type_id']  = $item->type_id;
            $data1['unit_id']  = $item->unit_id;
            $data1['comp_id']  = $item->comp_id;
            $data1['qty']      = $Data->qty;
            $data1['rate']     = $Data->rate;
            $data1['amt']      = $Data->amt;
            $data1['disc_pct'] = $Data->disc_pct;
            $data1['disc_amt'] = $Data->disc_amt;
            $data1['igst_pct'] = $Data->igst_pct;
            $data1['igst_amt'] = $Data->igst_amt;
            $data1['cgst_pct'] = $Data->cgst_pct;
            $data1['cgst_amt'] = $Data->cgst_amt;
            $data1['sgst_pct'] = $Data->sgst_pct;
            $data1['sgst_amt'] = $Data->sgst_amt;
            $data1['net_amt']  = $Data->net_amt;
            $data1['remark']  = $Data->remarks;
            session()->put('mtr_data','yes');
            session()->push('data.'.$Data->id, $data1);  
        }
        return view('spare.inventory.purchase_order.edit',compact('supplier','po_data'));
    }

    public function update(Request $request, $id)
    {   
        $all_ids = array(); 
        foreach (session('ids') as $ids) {
            $all_ids[] = $ids[0];
        }

        $update_data = PurchaseOrder_item::where('po_id',$id)->get();
        $update_ids  = array(); 
        foreach ($update_data as $up_data) {
            $update_ids[] = $up_data->id;
        }
        Session::put('update','yes');

        $data =  $request->validate([
            'qty.*'       =>'required|string',
            'rate.*'      =>'required|string',
            'disc_pct.*'  =>'required|string',
            'igst_pct.*'  =>'required|string',
            'cgst_pct.*'  =>'required|string',
            'sgst_pct.*'  =>'required|string',
            'amt.*'       =>'nullable',
            'disc_amt.*'  =>'nullable',
            'igst_amt.*'  =>'nullable',
            'cgst_amt.*'  =>'nullable',
            'sgst_amt.*'  =>'nullable',
            'net_amt.*'   => 'nullable|numeric',
            'po_no'       => 'required|numeric',
            'po_date'     => 'required|date',
            'vendor_code' => 'required|not_in:0',
            'mtr_no'      => 'nullable|not_in:0',
            'total_qty'   => 'nullable|numeric',
            'grand_total' => 'nullable|numeric',
            'totl_disc_amt'    => 'nullable|numeric',
            'totl_igst_amt'    => 'nullable|numeric',
            'totl_cgst_amt'    => 'nullable|numeric',
            'totl_sgst_amt'    => 'nullable|numeric',
            'totl_net_amt'     => 'nullable|numeric',
            'remarks'          => 'nullable'
            ]);
      
       $po_data['fleet_code']  = session('fleet_code');
       $po_data['po_number']   = $data['po_no'];
       $po_data['po_date']     = $data['po_date'];
       $po_data['vendor_code'] = $data['vendor_code'];
       if($request->mtr_no !=0){
             $po_data['mtr_no'] = $data['mtr_no'];            
        }
       $po_data['total_qty']   = $data['total_qty'];
       $po_data['grand_total'] = $data['grand_total'];
       $po_data['disc_amt']    = $data['totl_disc_amt'];
       $po_data['igst_amt']    = $data['totl_igst_amt'];
       $po_data['cgst_amt']    = $data['totl_cgst_amt'];
       $po_data['sgst_amt']    = $data['totl_sgst_amt'];
       $po_data['net_amt']     = $data['totl_net_amt'];
    
     
       $count = count($all_ids);       
       $x = 0;
       $id       = $request->id; 
       $qty      = $data['qty'];
       $rate     = $data['rate'];
       $disc_pct = $data['disc_pct'];
       $igst_pct = $data['igst_pct'];
       $cgst_pct = $data['cgst_pct'];
       $sgst_pct = $data['sgst_pct'];
       $amt      = $data['amt'];
       $disc_amt = $data['disc_amt'];
       $igst_amt = $data['igst_amt'];
       $cgst_amt = $data['cgst_amt'];
       $sgst_amt = $data['sgst_amt'];
       $net_amt  = $data['net_amt'];
       $status   = false;
       
       if($id){
            while($x < $count){
                $itm_data['spare_id']  = $id[$x];
                $itm_data['qty']       = $qty[$x];
                $itm_data['rate']      = $rate[$x];
                $itm_data['disc_pct']  = $disc_pct[$x];
                $itm_data['igst_pct']  = $igst_pct[$x];
                $itm_data['cgst_pct']  = $cgst_pct[$x];
                $itm_data['sgst_pct']  = $sgst_pct[$x];
                $itm_data['disc_amt']  = $disc_amt[$x];
                $itm_data['igst_amt']  = $igst_amt[$x];
                $itm_data['cgst_amt']  = $cgst_amt[$x];
                $itm_data['sgst_amt']  = $sgst_amt[$x];
                $itm_data['amt']       = $amt[$x];
                $itm_data['net_amt']   = $net_amt[$x];
                $itm_data['po_id']     = $id;
                if(in_array($all_ids[$x],$update_ids)){

                    PurchaseOrder_item::where('id',$all_ids[$x])->update($itm_data);   
                }
                else{
                    PurchaseOrder_item::create($itm_data);    
                }                
                $x++;
                $status = true;
           }
        }
        if($status){
            session::forget('data');        
            Session::forget('ids');
        }
        return redirect('purchase_order');
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
        if($request->page == 'edit'){

            $data     = MaterialItemRequest::where('request_id',$id)->get();        
            $mtr_dtls = MaterialRequest::find($id)->first();
            Session::put('mtr_no',$mtr_dtls->mtr_no);
            Session::put('mtr_id',$id);
            foreach ($data as $Data) {
                $item = SpareMaster::find($Data->spare_id);            
                Session::push('ids.'.$item->id,$item->id);
                $data1['id']       = $item->id;
                $data1['name']     = $item->name;
                $data1['type_id']  = $item->type_id;
                $data1['unit_id']  = $item->unit_id;
                $data1['comp_id']  = $item->comp_id;
                 $data1['qty']     = '' ;
                $data1['rate']     = '';
                $data1['amt']      = '';
                $data1['disc_pct'] = '';
                $data1['disc_amt'] = '';
                $data1['igst_pct'] = '';
                $data1['igst_amt'] = '';
                $data1['cgst_pct'] = '';
                $data1['cgst_amt'] = '';
                $data1['sgst_pct'] = '';
                $data1['sgst_amt'] = '';
                $data1['net_amt']  = '';
                $data1['remark']   = '';
                $data1['mtr_data'] = 'yes';
               
                session()->put('mtr_data','yes');
                session()->push('data.'.$item->id, $data1);  
            }
        }
        else{
            Session::forget('data');        
            Session::forget('ids');

            $data     = MaterialItemRequest::where('request_id',$id)->get();        
            $mtr_dtls = MaterialRequest::find($id)->first();
            Session::put('mtr_no',$mtr_dtls->mtr_no);
            Session::put('mtr_id',$id);
            foreach ($data as $Data) {
                $item = SpareMaster::find($Data->spare_id);            
                Session::push('ids.'.$item->id,$item->id);
                $data1['id']      = $item->id;
                $data1['name']    = $item->name;
                $data1['type_id'] = $item->type_id;
                $data1['unit_id'] = $item->unit_id;
                $data1['comp_id'] = $item->comp_id;
                $data1['qty']     = '';
                $data1['remarks'] = '';
                $data1['not']      = 'not';
                $data1['readonly'] = 'readonly';
                $data1['mtr_data'] = 'yes';
                session()->put('mtr_data','yes');
                session()->push('data.'.$item->id, $data1);  
            }
        }
        return view('spare.inventory.purchase_order.po_item_table',compact('data')); 
    }

    public function save_in_session(Request $request){
        $id      = array_unique($request->id);
        $page    = $request->page;
        $data1   = array();
        $data    = array(); 
        $ids     = session('ids');  
        $item_id = array();        
        if(session('mtr_data')=='yes'){
            session::forget('data');        
            Session::forget('ids');
            session()->put('mtr_data','no');
        }

        if($page =='edit'){
             foreach ($ids as $Ids) {
               $item_id[] = $Ids[0];            
            }                          
            
            foreach ($item_id as $Ids) {                
                $items     = PurchaseOrder_item::where('id',$Ids)->first();
                Session::push('ids.'.$Ids,$Ids);

                $data = SpareMaster::find($items->spare_id);
                $data1['id']      = $data->id;
                $data1['name']    = $data->name;
                $data1['type_id'] = $data->type_id;
                $data1['unit_id'] = $data->unit_id;
                $data1['comp_id'] = $data->comp_id;
                $data1['qty']     = $items->qty;
                $data1['rate']    = $items->rate;
                $data1['amt']     = $items->amt;
                $data1['disc_pct']= $items->disc_pct;
                $data1['disc_amt']= $items->disc_amt;
                $data1['igst_pct']= $items->igst_pct;
                $data1['igst_amt']= $items->igst_amt;
                $data1['cgst_pct']= $items->cgst_pct;
                $data1['cgst_amt']= $items->cgst_amt;
                $data1['sgst_pct']= $items->sgst_pct;
                $data1['sgst_amt']= $items->sgst_amt;
                $data1['net_amt']= $items->net_amt;
                $data1['remarks']= $items->remarks;

                session()->push('data.'.$Ids, $data1);                             
            }
            foreach ($id as $Id) {
                Session::push('ids.'.$Id,$Id);
                $data = SpareMaster::find($Id);
                $data1['id']      = $data->id;
                $data1['name']    = $data->name;
                $data1['type_id'] = $data->type_id;
                $data1['unit_id'] = $data->unit_id;
                $data1['comp_id'] = $data->comp_id;
                $data1['qty']     = '' ;
                $data1['rate']    = '';
                $data1['amt']     = '';
                $data1['disc_pct']= '';
                $data1['disc_amt']= '';
                $data1['igst_pct']= '';
                $data1['igst_amt']= '';
                $data1['cgst_pct']= '';
                $data1['cgst_amt']= '';
                $data1['sgst_pct']= '';
                $data1['sgst_amt']= '';
                $data1['net_amt'] = '';
                $data1['remarks'] = '';
                session()->push('data.'.$data->id, $data1);
            }
            return view('spare.inventory.purchase_order.po_item_table',compact('data'));             
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
             return view('spare.inventory.purchase_order.po_item_table',compact('data'));
         }            
    }
}
