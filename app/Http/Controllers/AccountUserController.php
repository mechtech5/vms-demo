<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use DB;
use Auth;
use App\Fleet;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMailable;

class AccountUserController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = User::where('account_id',Auth::user()->id)->get();
        return view('account_user.index',compact('user'));
    }

    public function create()
    {
        return view('account_user.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[ 'name' =>'required',
                                   'email' => 'required|email|unique:users,email'
                                 ]);
        $name1     = strtolower($request->name);
        $password = substr($name1,0,4).'1234';
        $data     = array(
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($password),
                    );
        $data['account_id'] = Auth::user()->id;
        
        $last_id = User::insertGetId($data);
        $user    = User::find($last_id);
        $user->roles()->sync(2);

        $name['name']     = $name1;
        $name['password'] = $password;
        $name['username'] = $request->email;
        Mail::to($request->email)->send(new SendMailable($name));
        return redirect('accountuser');
    }
   
    public function show($id)
    {
        $fleet = User::join('fleet_user','users.id','=','fleet_user.user_id')->where('user_id',$id)->get();
        $user_id = $id;
        $model_fleet = Fleet::where('fleet_owner',Auth::user()->id)->get();

        return view('account_user.show',compact('fleet','user_id','model_fleet'));
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
}
