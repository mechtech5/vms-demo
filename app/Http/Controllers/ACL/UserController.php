<?php

namespace App\Http\Controllers\ACL;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;

class UserController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('acl.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[ 'name' =>'required',
                             'email' => 'required|email|unique:users,email',
                             'password' => 'required',
                             'password_confirmation' => 'required_with:password|same:password'
        ]);
        $data = array(
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                );
        User::insert($data);
        return redirect('admin');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data  = array();
        $data['user']        = User::find($id);
        $data['role']        = Role::get();
        $data['permissions'] = Permission::get();
        $permission  = DB::table('model_has_permissions')->where('model_id',$id)->get();

        $permission_ids = array();
        foreach ($permission as $id) {
            $permission_ids[] = $id->permission_id; 
        }
        
        return view('acl.users.show',compact('data','permission_ids'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::find($id);
        return view('acl.users.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        return redirect('admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        DB::table('fleet_mast')->where('fleet_owner',$id)->delete();
        return redirect('admin');
    }

    public function changesRole(Request $request){
        $userId = $request->userId;
        $roleId = $request->roleId;

        $user = User::where('id', '=', $userId)->firstOrFail();
        $user->roles()->sync($roleId);
    }

    public function changePermission(Request $request){
        $user         = User::findOrFail($request->userId);
        $permissionid = $request->permissionId;
        $user->syncPermissions($permissionid);
    }
}
