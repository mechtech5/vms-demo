<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\vch_comp;
use Session;
use Illuminate\Support\Facades\Storage;
use File;

class VehicledetailsController extends Controller
{
    
    public function index()
    {
        $fleet_code = session('fleet_code');
        $chk_path = storage_path('app/public/'.$fleet_code.'/vehicle_number');
               
        if(! File::exists($chk_path)){
            File::makeDirectory($chk_path, 0777, true, true);
        }

        $fleet_code = session('fleet_code');
        $model = DB::table('vch_mast')->where('fleet_code',$fleet_code)->get();
        return view('vehicle_detail.show',compact('model'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $fleet_code = session('fleet_code');

       $model   = DB::table('vch_model')->where('fleet_code',$fleet_code)->get();
       $city    = DB::table('master_cities')->where('fleet_code',$fleet_code)->get();
       $company = vch_comp::where('fleet_code',$fleet_code)->get();

       return view('vehicle_detail.create',compact('company','model','city'));
    }

    
    public function store(Request $request)
    {                          
        $vdata = $this->all_form_data($request);
        $vdata['fleet_code'] = session('fleet_code');
        $ddata = $this->store_image($request,$vdata);

        DB::table('vch_mast')->insert($ddata);
        return redirect('vehicledetails');
    }

    public function all_form_data($request){
        $vdata = $request->validate(['vch_no'           =>'required',
                                  'vch_comp'            => 'required',
                                  'vch_model'           => 'required',
                                  'owner_name'          => 'nullable',
                                  'owner_addr'          => 'nullable',
                                  'owner_pan'           => 'nullable',
                                  'reg_make'            => 'nullable',
                                  'reg_no_tyres'        => 'nullable',
                                  'reg_chassis_no'      => 'nullable',
                                  'reg_engine_no'       => 'nullable',
                                  'reg_manuf_year'      => 'nullable',
                                  'reg_date'            => 'nullable',
                                  'reg_tank_cap'        => 'nullable',
                                  'pur_dealer_name'     => 'nullable',
                                  'pur_dealer_addr'     => 'nullable',
                                  'pur_dealer_city'     => 'nullable',
                                  'pur_after_sales_srv' => 'nullable',
                                  'pur_invoice_no'      => 'nullable',
                                  'pur_invoice_dt'      => 'nullable',
                                  'pur_free_srv'        => 'nullable',
                                  'pur_free_srv_count'  => 'nullable',
                                  'pur_duplicate_key'   => 'nullable',
                                  'chassis_serial_no'   => 'nullable',
                                  'accessories_supplied'=> 'nullable',
                                  'body_height'         => 'nullable',
                                  'chassis_length'      => 'nullable',
                                  'chassis_color'       => 'nullable',
                                  'body_color'          => 'nullable',
                                  'sale_dt'             => 'nullable',
                                  'sale_amt'            => 'nullable',
                                  'buyer_addr'          => 'nullable',
                                  'buyer_city'          => 'nullable',
                                  'buyer_phone'         => 'nullable',
                                  'sale_odo_reading'    => 'nullable',
                                  'sale_comments'       => 'nullable',
                                  'eng_serial_no'       => 'nullable',
                                  'eng_power'           => 'nullable',
                                  'eng_ignition_key_no' => 'nullable',
                                  'eng_fuel_type'       => 'nullable',
                                  'eng_door_key_no'     => 'nullable',
                                  'eng_color'           => 'nullable',
                                  'eng_cylinder_count'  => 'nullable',
                                  'eng_torque'          => 'nullable',
                                  'vch_pic'             => 'nullable|file|max:10000',
                                  'chassic_pic'         => 'nullable|file|max:10000',
                                  'rc_book_pic'         => 'nullable|file|max:10000',
                                  'owner_pan_pic'       => 'nullable|file|max:10000',
                                  'tds_declaration_pic' => 'nullable|file|max:10000'
        ]);
        return $vdata;
    }

    public function store_image($request,$vdata,$id=''){
        $fleet_code = session('fleet_code');
        $files  = array();

        if($request->hasFile('vch_pic')) {
       
            $filename = $request->file('vch_pic')->getClientOriginalName();
            $extension = $request->file('vch_pic')->getClientOriginalExtension();
            $fileNameToStore = $request->vch_no.'_vch_pic.'.$extension;

            $chk_path = storage_path('app/public/'.$fleet_code.'/vehicle_number/'.$vdata['vch_no']);
               
            if(! File::exists($chk_path)){
                File::makeDirectory($chk_path, 0777, true, true);
            }

            $path = $request->file('vch_pic')->storeAs('public/'.$fleet_code.'/vehicle_number/'.$vdata['vch_no'], $fileNameToStore);
            $vdata['vch_pic'] = $fileNameToStore;    
        }

        if($request->hasFile('chassic_pic')){
            $filename = $request->file('chassic_pic')->getClientOriginalName();
            $extension = $request->file('chassic_pic')->getClientOriginalExtension();
            $fileNameToStore = $request->vch_no.'_chassic_pic.'.$extension;

            $chk_path = storage_path('app/public/'.$fleet_code.'/vehicle_number/'.$vdata['vch_no']);
               
            if(! File::exists($chk_path)){
                File::makeDirectory($chk_path, 0777, true, true);
            }

            $path = $request->file('chassic_pic')->storeAs('public/'.$fleet_code.'/vehicle_number/'.$vdata['vch_no'], $fileNameToStore);
            $vdata['chassic_pic'] = $fileNameToStore;   
        }

        if($request->hasFile('rc_book_pic')){
            $filename = $request->file('rc_book_pic')->getClientOriginalName();
            $extension = $request->file('rc_book_pic')->getClientOriginalExtension();
            $fileNameToStore = $request->vch_no.'_rc_book_pic.'.$extension;

            $chk_path = storage_path('app/public/'.$fleet_code.'/vehicle_number/'.$vdata['vch_no']);
               
            if(! File::exists($chk_path)){
                File::makeDirectory($chk_path, 0777, true, true);
            }

            $path = $request->file('rc_book_pic')->storeAs('public/'.$fleet_code.'/vehicle_number/'.$vdata['vch_no'], $fileNameToStore);
            $vdata['rc_book_pic'] = $fileNameToStore;   
        }

        if($request->hasFile('owner_pan_pic')){
            $filename = $request->file('owner_pan_pic')->getClientOriginalName();
            $extension = $request->file('owner_pan_pic')->getClientOriginalExtension();
            $fileNameToStore = $request->vch_no.'_owner_pan_pic.'.$extension;

            $chk_path = storage_path('app/public/'.$fleet_code.'/vehicle_number/'.$vdata['vch_no']);
               
            if(! File::exists($chk_path)){
                File::makeDirectory($chk_path, 0777, true, true);
            }

            $path = $request->file('owner_pan_pic')->storeAs('public/'.$fleet_code.'/vehicle_number/'.$vdata['vch_no'], $fileNameToStore);
            $vdata['owner_pan_pic'] = $fileNameToStore;   
        }

        if($request->hasFile('tds_declaration_pic')){
            $filename = $request->file('tds_declaration_pic')->getClientOriginalName();
            $extension = $request->file('tds_declaration_pic')->getClientOriginalExtension();
            $fileNameToStore = $request->vch_no.'_tds_declaration_pic.'.$extension;

            $chk_path = storage_path('app/public/'.$fleet_code.'/vehicle_number/'.$vdata['vch_no']);
               
            if(! File::exists($chk_path)){
                File::makeDirectory($chk_path, 0777, true, true);
            }

            $path = $request->file('tds_declaration_pic')->storeAs('public/'.$fleet_code.'/vehicle_number/'.$vdata['vch_no'], $fileNameToStore);
            $vdata['tds_declaration_pic'] = $fileNameToStore;   
        }


        //its for empty image
        if(!empty($id)){
            $old_data = DB::table('vch_mast')->where('id',$id)->first();
            if($request->vch_pic == null) {
                $vdata['vch_pic'] = $old_data->vch_pic;    
            }

            if($request->chassic_pic == null){
               $vdata['chassic_pic'] = $old_data->chassic_pic;   
            }

            if($request->rc_book_pic == null){
                $vdata['rc_book_pic'] = $old_data->rc_book_pic;   
            }

            if($request->owner_pan_pic == null){
                 $vdata['owner_pan_pic'] = $old_data->owner_pan_pic;
            }

            if($request->tds_declaration_pic == null){
                $vdata['tds_declaration_pic'] = $old_data->tds_declaration_pic; 
           }
        }
        return $vdata;
    }

       
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
       $fleet_code = session('fleet_code');
       $model  = DB::table('vch_model')->get();
       $company = vch_comp::where('fleet_code',$fleet_code)->get();
       $edata   = DB::table('vch_mast')->where('id',$id)->first();
             
       return view('vehicle_detail.edit',compact('company','model','edata'));
    }

 
    public function update(Request $request, $id)
    {      
        $fleet_code = session('fleet_code');  
        $old_data =  DB::table('vch_mast')->where('id',$id)->first();
        $vdata = $this->all_form_data($request);
        $vdata['fleet_code'] = $fleet_code;
        $all_data = $this->store_image($request,$vdata,$id);
        
        DB::table('vch_mast')->where('id',$id)->update($all_data);

        if($old_data->vch_pic != $all_data['vch_pic'] && $all_data['vch_pic']!=null){
            Storage::delete('app/public/'.$fleet_code.'/vehicle_number/'.$old_data->vch_no.'/'.$old_data->vch_pic);
        }

        if($old_data->chassic_pic != $all_data['chassic_pic'] && $all_data['chassic_pic'] !=null){
            Storage::delete('app/public/'.$fleet_code.'/vehicle_number/'.$old_data->vch_no.'/'.$old_data->chassic_pic);
        }

        if($old_data->rc_book_pic != $all_data['rc_book_pic'] && $all_data['rc_book_pic'] != null){
            Storage::delete('app/public/'.$fleet_code.'/vehicle_number/'.$old_data->vch_no.'/'.$old_data->rc_book_pic);
        }

        if($old_data->owner_pan_pic != $all_data['owner_pan_pic'] &&  $all_data['owner_pan_pic'] !=null){
            Storage::delete('app/public/'.$fleet_code.'/vehicle_number/'.$old_data->vch_no.'/'.$old_data->owner_pan_pic);
        }

        if($old_data->tds_declaration_pic != $all_data['tds_declaration_pic'] && $all_data['tds_declaration_pic']!=null){
            Storage::delete('app/public/'.$fleet_code.'/vehicle_number/'.$old_data->vch_no.'/'.$old_data->tds_declaration_pic);
        }
        return redirect('vehicledetails');
    }

    
    public function destroy($id)
    {
        $fleet_code = session('fleet_code');

        $img_data = DB::table('vch_mast')->where('id',$id)->first();
        DB::table('vch_mast')->where('id',$id)->delete();

        Storage::deleteDirectory('public/'.$fleet_code.'/vehicle_number/'.$img_data->vch_no);

        return redirect('vehicledetails');
    }

    public function get_model(Request $request)
    {
        $id = $request->id;
        $model = DB::table('vch_model')->where('vcompany_code',$id)->get(); ?>
        <option>Selecte..</option>
        <?php foreach ($model as $models) { ?>
            <option value="<?php echo $models->id; ?>"><?php echo $models->model_name; ?></option>
       <?php  } 
    }

}