<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use DB;
use Auth;
use App\Fleet;
use App\FleetUser;
use App\Mail\UserRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;
use App\Models\Account;
use App\SendCode;

class AccountUserController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = User::where('parent_id',Auth::user()->id)->get();
        return view('account_user.index',compact('user'));
    }

    public function create()
    {
        return view('account_user.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[ 'name' =>'required',
                                   'email' => 'required|email|unique:users,email',
                                   'mobile_no'=>'required|numeric'
                                 ]);
        $name1     = strtolower($request->name);
        $password = substr($name1,0,4).'1234';
        $data     = array(
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($password),
                    'mobile_no' => $request->mobile_no,
                    );
        $data['parent_id'] = Auth::user()->id;
        $data['acc_type']  = 'C';
        
        $last_id = User::insertGetId($data);
        $user    = User::find($last_id);
        $user->roles()->sync(3);

        $dta = array(
            'password' => $password, 
            'email' => $request->email,
            'mobile_no' => $request->mobile_no,
        );
        
        return $dta;
        
        //Mail::to($request->email)->send(new SendMailable($name));
        // dd($name);
        //return view('account_user.create',compact('name'));
    }
   
    public function show($id)
    { 
        $fleet = User::join('fleet_user','users.id','=','fleet_user.user_id')->where('user_id',$id)->get();
        $user_id = $id; 
        $model_fleet = Fleet::where('fleet_owner',Auth::user()->id)->get();
       $user_fleet=FleetUser::where('user_id',$user_id)->get();
        $user_fleet_id = array();
        foreach ($user_fleet as $value) {
          $user_fleet_id[] = $value->fleet_id;
        }
       // dd($model_fleet);
        return view('account_user.show',compact('fleet','user_id','model_fleet','user_fleet_id'));
    }

    
    public function edit($id)
    {
        $data = User::find($id);
        return view('account_user.edit',compact('data'));
    }

   
    public function update(Request $request, $id)
    {
        $this->validate($request,[ 'name' =>'required',
                                  ]);
        $data = User::find($id);
    
        $data['name'] = $request->name;
        if(!empty($request->password)){
            $data['password'] = Hash::make($request->password);
        }
       $data->save();
        return redirect('accountuser');
    }

    
    public function destroy($id)
    { 
        User::destroy($id);
        DB::table('fleet_mast')->where('fleet_owner',$id)->delete();
        return redirect('accountuser');
    }

    public function add_on_user(Request $request){
      $ids      = $request->id;
      $user_id  = $request->user_id;

      $data = array();
      foreach ($ids as $id) {
        $data = ['fleet_id'=>$id,'user_id'=>$user_id];
        DB::table('fleet_user')->insert($data);
      }
     $fleet = User::join('fleet_user','users.id','=','fleet_user.user_id')->where('user_id',$user_id)->get();    
      return view('account_user.table_refresh',compact('fleet'));  
    }

    public function checkAccount(Request $request){
      $id = $request->id;
      $data = Account::where('acc_owner',$id)->get()->count();
      return $data;
    }

    public function AuthLogout(){
        Auth::logout();
    }

    public function verifiction(Request $request){
        dd("ram");
        $mobile_no = $request->mobile_no;

        $verify =SendCode::sendCode($mobile_no);
        return $verify;
    }
}

