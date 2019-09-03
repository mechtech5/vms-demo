<?php

namespace App\Http\Controllers\Fuel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Exports\PetrolPumpExport;
use App\Imports\PetrolPumpImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\PetrolPump;
use Session;
use App\State;
use App\City;

class PetrolPumpController extends Controller
{
    
    public function index()
    {
        $fleet_code = session('fleet_code');
        $petrol = PetrolPump::where('fleet_code',$fleet_code)->get();
        return view('fuel.petrolpump.show',compact('petrol'));
    }

   
    public function create()
    {
        $fleet_code = session('fleet_code');
        $state = State::where('fleet_code',$fleet_code)->get();
        return view('fuel.petrolpump.create',compact('state'));
    }

    
    public function store(Request $request)
    {
        $data = $request->validate([
                                    "pump_name" => 'required',
                                    "pump_phone" => 'required',
                                    "pump_gst_no" => 'required',
                                    "contact_name" => 'nullable',
                                    "contact_phonw" => 'nullable',
                                    "pump_website" => 'nullable',
                                    "pump_email" => 'nullable',
                                    "note" => 'nullable',
                                    'pump_state' =>'required|not_in:0',
                                    'pump_city'  =>'required|not_in:0'
                                    ]);
        $data['fleet_code'] = session('fleet_code');
        PetrolPump::create($data);
        return redirect('petrolpump');
    }
   
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $fleet_code = session('fleet_code');
        $state = State::where('fleet_code',$fleet_code)->get();
        $data = PetrolPump::find($id);
        return view('fuel.petrolpump.edit',compact('state','data'));
    }

    
    public function update(Request $request, $id)
    {
         $data = $request->validate([
                                    "pump_name" => 'required',
                                    "pump_phone" => 'required',
                                    "pump_gst_no" => 'required',
                                    "contact_name" => 'nullable',
                                    "contact_phonw" => 'nullable',
                                    "pump_website" => 'nullable',
                                    "pump_email" => 'nullable',
                                    "note" => 'nullable',
                                    'pump_state' =>'required|not_in:0',
                                    'pump_city'  =>'required|not_in:0'
                                    ]);
        $data['fleet_code'] = session('fleet_code');
        PetrolPump::where('id',$id)->update($data);
        return redirect('petrolpump');
    }

    public function destroy($id)
    {
        PetrolPump::where('id',$id)->delete();
        return redirect('petrolpump');
    }

    public function get_city(Request $request){
        $id = $request->id;
        $city = City::where('state_id',$id)->get(); 


        ?>
        
        <option value="0" >Select..</option>
    <?php  foreach ($city as $cities) {
        ?>
            <option value="<?php echo $cities['id']; ?>"><?php echo $cities->city_name; ?></option>
    <?php   }
    


    }

     public function export() 
    {
        return Excel::download(new PetrolPumpExport, 'PetrolPump.xlsx');
    }

     public function import(Request $request) 
    {
        $data = Excel::import(new PetrolPumpImport,request()->file('file'));
        
        return redirect('petrolpump');
    }

    public function download() {
       $file_path = public_path('demo_files/Demo_Kmupdate.xlsx');
    return response()->download($file_path);
    }
}
