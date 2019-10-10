<?php

namespace App\Http\Controllers\Spare;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\Exports\SpareVendorExport;
use App\Imports\SpareVendorImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\SpareVendor;
use App\State;
use App\City;

class SpareVendorController extends Controller
{
  
    public function index()
    {
        $fleet_code = session('fleet_code');
        $vendor = SpareVendor::where('fleet_code',$fleet_code)->get();
        return view('spare.spare_vendor.show',compact('vendor'));
        
    }

    
    public function create()
    {
        $fleet_code = session('fleet_code');
        $state = State::where('fleet_code',$fleet_code)->get();
        return view('spare.spare_vendor.create',compact('state'));
    }

  
    public function store(Request $request)
    {
        $data = $request->validate(["name" => 'required',
                                    "contact_person_name" => 'nullable',
                                    "contact_person_phone" => 'nullable',
                                    "gst" => 'required|numeric',
                                    "mobile" => 'nullable',
                                    "email" => 'nullable',
                                    "website" => 'nullable',
                                    "state_id" => "required|not_in:0",
                                    "city_id" => "required|not_in:0",
                                    "addr" => 'nullable',
                                    'phone'=> 'nullable'
                                    ]);
        $data['fleet_code'] = session('fleet_code');
        SpareVendor::create($data);
        return redirect('sparevendor');
    }

   
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
       $fleet_code = session('fleet_code');
        $state = State::where('fleet_code',$fleet_code)->get();
        $data  = SpareVendor::find($id);
        return view('spare.spare_vendor.edit',compact('state','data'));
    }

    public function update(Request $request, $id)
    {
       $data = $request->validate(["name" => 'required',
                                    "contact_person_name" => 'nullable',
                                    "contact_person_phone" => 'nullable',
                                    "gst" => 'required|numeric',
                                    "mobile" => 'nullable',
                                    "email" => 'nullable',
                                    "website" => 'nullable',
                                    "state_id" => "required|not_in:0",
                                    "city_id" => "required|not_in:0",
                                    "addr" => 'nullable',
                                    'phone'=> 'nullable'
                                    ]);
        $data['fleet_code'] = session('fleet_code');
        SpareVendor::where('id',$id)->update($data);
        return redirect('sparevendor');
    }

  
    public function destroy($id)
    {
         SpareVendor::where('id',$id)->delete();
        return redirect('sparevendor');
    }

    public function export() 
    {
        return Excel::download(new SpareVendorExport, 'SpareVendor.xlsx');
    }

     public function import(Request $request) 
    {
        $data = Excel::import(new SpareVendorImport,request()->file('file'));
        
        return redirect('sparevendor');
    }

    public function download() {
       $file_path = public_path('demo_files/Demo_SpareVendor.xlsx');
       return response()->download($file_path);
    }

    public function get_city(Request $request){
        $id   = $request->id;
        $fleet_code = session('fleet_code');
        $city = City::where('state_id',$id)->where('fleet_code',$fleet_code)->get(); ?>
        <option>Select..</option>
        <?php 
        foreach ($city as $cities) { ?>
            <option value="<?php echo $cities->id; ?>"><?php echo $cities->city_name; ?></option>
    <?php    }
         
    }
}
