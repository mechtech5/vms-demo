<?php

namespace App\Http\Controllers\Spare;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SpareVendor;
use App\Models\SpareMaster;
use App\Models\SpareType;

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
}
