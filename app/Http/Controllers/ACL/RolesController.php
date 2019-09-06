<?php

namespace App\Http\Controllers\ACL;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RolesController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
       
        $show_role    = DB::table('roles')->get();
        $permissions  = DB::table('permissions')->get();
        $user         = DB::table('users')->get();
        return view('acl.admin_satting',compact('show_role','permissions','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('acl.role.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate(['name' => 'required']);
        $data['created_at'] = date("Y-m-d H:i:s"); 
        $name = $request->name;  

        $role = Role::create(['name' => $name]);
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
        $permison_list = DB::table('role_has_permissions')->where('role_id',$id)->get();
        $permission_ids = array();
        foreach ($permison_list as $var) {
            $permission_ids[] = $var->permission_id;
        }
        
        $role = Role::find($id);
        $permissions = DB::table('permissions')->get();
        return view('acl.role.show',compact('role','permissions','permission_ids'));
    }

    /**
     * Show the form for editing the specified resource. 
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::table('roles')->find($id);
        return view('acl.role.edit',compact('data'));
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
        $id  = $request->id;
        $request->validate(['name' => 'required']);
        
        $update['name'] = $request->name; 
        $update['updated_at'] = date("Y-m-d H:i:s");
        DB::table('roles')->where('id',$id)->update($update);
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
         DB::table('roles')->where('id',$id)->delete();
         return redirect('admin');
    }

    public function saveChanges(Request $request){
        $role       = Role::findOrFail($request->roleId);
        $permissionid = $request->permissionId;
            
        // foreach($permissionid as $id){
        //     $p = Permission::where('id', '=', $id)->firstOrFail();
            $role->syncPermissions($permissionid);
        // }
        return "Permissions Save" ;
    }
}
