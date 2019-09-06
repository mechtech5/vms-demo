<?php

namespace App\Http\Controllers\Tyre;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Exports\TyreVendorExport;
use App\Imports\TyreVendorImport;
use Maatwebsite\Excel\Facades\Excel;
use Session;
use App\Models\TyreVendor;
use App\State;
use App\City;

class TyreVendorController extends Controller
{
  
    public function index()
    {
        $fleet_code = session('fleet_code');
        $vendor = TyreVendor::where('fleet_code',$fleet_code)->get();
        return view('tyre.tyre_vendor.show',compact('vendor'));
    }
   
    public function create()
    {
        $fleet_code = session('fleet_code');
        $state = State::where('fleet_code',$fleet_code)->get();
        return view('tyre.tyre_vendor.create',compact('state'));
    }
   
    public function store(Request $request)
    {
        $data = $request->validate(["name" => 'required|alpha',
                                    "contact_person_name" => 'nullable|alpha',
                                    "contact_person_phone" => 'nullable|min:10|max:10',
                                    "gst" => 'required|numeric',
                                    "mobile" => 'nullable|min:10|max:10',
                                    "email" => 'nullable',
                                    "website" => 'nullable',
                                    "state_id" => "required|not_in:0",
                                    "city_id" => "required|not_in:0",
                                    "addr" => 'nullable',
                                    'phone'=> 'nullable|min:10|max:10',
                                    'vendor_type'=>'required'
                                    ]);
        $data['fleet_code'] = session('fleet_code');
        TyreVendor::create($data);
        return redirect('tyrevendor');
    }
    
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
       $fleet_code = session('fleet_code');
        $state = State::where('fleet_code',$fleet_code)->get();
        $data  = TyreVendor::find($id);
        return view('tyre.tyre_vendor.edit',compact('state','data'));
    }

    public function update(Request $request, $id)
    {
       $data = $request->validate(["name" => 'required|alpha',
                                    "contact_person_name" => 'nullable|alpha',
                                    "contact_person_phone" => 'nullable|min:10|max:10',
                                    "gst" => 'required|numeric',
                                    "mobile" => 'nullable|min:10|max:10',
                                    "email" => 'nullable',
                                    "website" => 'nullable',
                                    "state_id" => "required|not_in:0",
                                    "city_id" => "required|not_in:0",
                                    "addr" => 'nullable',
                                    'phone'=> 'nullable|min:10|max:10',
                                    'vendor_type'=>'required'
                                    ]);
        $data['fleet_code'] = session('fleet_code');
        TyreVendor::where('id',$id)->update($data);
        return redirect('tyrevendor');
    }

    public function destroy($id)
    {
        TyreVendor::where('id',$id)->delete();
        return redirect('tyrevendor');
    }

    public function export() 
    {
        return Excel::download(new TyreVendorExport, 'TyreVendor.xlsx');
    }

     public function import(Request $request) 
    {
        $data = Excel::import(new TyreVendorImport,request()->file('file'));
        
        return redirect('tyrevendor');
    }

    public function download() {
       $file_path = public_path('demo_files/Demo_TyreVendor.xlsx');
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
