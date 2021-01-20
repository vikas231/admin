<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\User;
use Spatie\Permission\Models\Permission;


class UserController extends Controller
{
    //
    public function roles()
    {
        $roles = Role::select('id', 'name', 'created_at')->get();
        return view('admin.roles.index')->with('roles', $roles);
    }

    public function createRole()
    {
        return view('admin.roles.create');
    }

    public function saveRole(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:roles,name',
        ]);

        $role_name = strtolower($request->name);
        $role = Role::create(['name' => $role_name]);
        return redirect()->back()->with('message', 'Role Created Successfully!');
    }
    public function editRole($id)
    {
        $role = Role::where('id', $id)->first();
        return view('admin.roles.edit')->with('role', $role);
    }
    public function updateRole(Request $request)
    {
        $role = Role::where('id', $request->id)->first();
        $role->fill($request->all());
        $role->save();
        return redirect()->back()->with('message', 'Role Upada Successfully!');
    }

    public function deleteRole($id)
    {
        $role = Role::where('id', $id)->first();
        $role->delete();
        return redirect()->back()->with('message', 'Role deleted Successfully!');
    }

    public function permissions()
    {
        $permissions = Permission::select('id', 'name', 'created_at')->get();
        return view('admin.permissions.index')->with('permissions', $permissions);
    }


    public function createPermission()
    {
        return view('admin.permissions.create');
    }

    public function savePermission(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:permissions,name',
        ]);

        $permission = strtolower($request->name);
        Permission::create(['name' => $permission]);
        return redirect()->back()->with('message', 'Permission added Successfully!');
    }

    public function deletePermission($id)
    {
        $permission = Permission::where('id', $id)->first();
        $permission->delete();
        return redirect()->back()->with('message', 'Permission deleted Successfully!');
    }

    public function roleManagement(){
        $roles = Role::all();
       
       return view('admin.role-management.index')->with(array('roles'=> $roles));
    }

    public function addPermiddionToRole(Request $request){
        $rolepermissions = [];
        $role_id = isset($request->id) ? $request->id : '';
        // dd( $role_id);
        if(isset($request->id) && $request->id  != ''){
            $role = Role::where('id', $request->id)->first();
            $rolepermissions = $role->permissions->pluck('id')->toArray();
        }
       
        $permissions = Permission::select('id', 'name', 'created_at')->get();
        $roles = Role::select('id', 'name', 'created_at')->get();
        return view('admin.role-management.create')->with(array('roles' => $roles, 
        'permissions' => $permissions,
        'rolepermissions'=>$rolepermissions,
        'role_id'  =>  $role_id
        )
    );
    }

    public function  attachPermissionToRole(Request $request){
        $role = Role::find($request->id);
        $permissions =  $request->permissions;
        $role->syncPermissions($permissions);
        return redirect()->back()->with('message', 'Assign permissions to role Successfully!');
    }
    public function blogs(){
        return view('admin.blog.index');

    }

    public function createBlog(Request $request){
       return view('admin.blog.create');
    }

    public function saveBlog(Request $request){
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/blogs');
            $image->move($destinationPath, $name);
            return back()->with('success','Image Upload successfully');
        }

    }

    public function  employers(){
        $employers = User::role('employer')->get();
        return view('admin.employers.index')->with('employers',$employers);
    }
    public function  jobseekers(){
        $jobseekers = User::role('jobseeker')->get();
        return view('admin.jobseekers.index')->with('jobseekers',$jobseekers);
    }

    public function  recruiters(){
        $recruiters = User::role('recruiter')->get();
        return view('admin.recruiters.index')->with('recruiters',$recruiters);
    }
    public function  bloggers(){
        $bloggers = User::role('blogger')->get();
        return view('admin.bloggers.index')->with('bloggers',$bloggers);
    }
    public function  mentors(){
        $mentors = User::role('mentor')->get();
        return view('admin.mentors.index')->with('mentors',$mentors);
    }
    

}
