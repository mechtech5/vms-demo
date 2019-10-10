<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;
use File;
use DB;
use Session;
use App\City;
use App\Exports\DriverExport;
use App\Imports\DriverImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;
use Auth;
use App\Driver;


class DriverdetailsController extends Controller
{
    
    public function index()
    {
        $fleet_code = session('fleet_code');
        $driver = Driver::where('fleet_code',$fleet_code)->get();

        return view('driver_details.show',compact('driver'));  
    }

    public function create()
    {
        $fleet_code = session('fleet_code');
        $state  = Driver::where('fleet_code',$fleet_code)->get(); 
        
        return view('driver_details.create',compact('state'));
    }

   
    public function store(Request $request)
    {      
        $vdata = $this->all_form_data($request);
        $vdata['fleet_code'] = session('fleet_code');
        $ddata = $this->store_image($request,$vdata);
        $ddata['created_by'] = Auth::user()->id;
        Driver::create($ddata);
        return redirect('driver');
    }

  
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $fleet_code = session('fleet_code');
        $state  = DB::table('master_states')->where('fleet_code',$fleet_code)->get();
        $edata = Driver::where('id',$id)->first();
        return view('driver_details.edit',compact('edata','state'));
    }

  
    public function update(Request $request, $id)
    {
        $vdata = $this->all_form_data($request);
        $vdata['fleet_code'] = session('fleet_code');
        $ddata = $this->store_image($request,$vdata,$id);
        $ddata['created_by'] = Auth::user()->id;
        Driver::where('id',$id)->update($ddata);
        return redirect('driver');
    }

    
    public function destroy($id)
    {
        $fleet_code = session('fleet_code');
        $old_data = DB::table('driver_mast')->where('id',$id)->first();
        $img = DB::table('driver_mast')->where('id',$id)->delete();
        Storage::delete('public/'.$fleet_code.'/vehicle_driver/'.$old_data->image);
        return redirect('driver');
    }

    public function all_form_data($request){

        $vdata = $request->validate(['name'    =>'required',
                                  'address'    => 'nullable',
                                  'phone'      => 'required|min:10',
                                  'license_no' => 'required|min:14',
                                  'license_exp'=> 'required',                             
                                  'joined_dt'  => 'nullable',
                                  'blood_group'=> 'nullable',
                                  'is_active'  => 'nullable',
                                  'image'      => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10000'
                                ]);
        return $vdata;
    }

     public function store_image($request,$vdata,$id=''){
        $fleet_code = session('fleet_code');
        if($request->hasFile('image')) {
       
            $filename = $request->file('image')->getClientOriginalName();
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $request->name.'_'.$filename.'.'.$extension;

            $chk_path = storage_path('app/public/'.$fleet_code.'/vehicle_driver');
               
            if(! File::exists($chk_path)){
                File::makeDirectory($chk_path, 0777, true, true);
            }

            $path = $request->file('image')->storeAs('public/'.$fleet_code.'/vehicle_driver/', $fileNameToStore);
            $vdata['image'] = $fileNameToStore;    
        }
       if(!empty($id)){
          $old_data = Driver::where('id',$id)->first();
            if($request->image == null) {
                $vdata['image'] = $old_data->image;    
            }
       }
        return $vdata;
    }

    public function get_city(Request $request){
        $id   = $request->id; 
        $city = DB::table('master_cities')->where('state_id',$id)->get();
        ?>
            <option>Select..</option>
    <?php    foreach ($city as $cities) { ?>
            <option value='<?php echo $cities->id ;?>'><?php echo $cities->city_name ;?></option>
    <?php  } 
    }

     public function export() 
    {
        return Excel::download(new DriverExport, 'driver.xlsx');
    }

     public function import(Request $request) 
    {
        $data = Excel::import(new DriverImport,request()->file('file'));
        
        return redirect('driver');
    }
    public function download() {
        $file_path = public_path('demo_files/Demo_DriverFormat.xlsx');
        return response()->download($file_path);
    }

}
