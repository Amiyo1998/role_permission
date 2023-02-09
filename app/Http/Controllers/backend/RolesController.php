<?php

namespace App\Http\Controllers\backend;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Requests\RolesRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

class RolesController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next){
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }
    public function index()
    {
        if (is_null($this->user) || !$this->user->can('role.view')) {
            abort(403, 'Sorry!! You are Unauthorized to view any role!');
        }
        $data['title'] = "Role";
        $data['roles'] = Role::all();
        return view('backend.pages.roles.index', $data);
    }

    public function create()
    {
        if (is_null($this->user) || !$this->user->can('role.create')) {
            abort(403, 'Sorry!! You are Unauthorized to create any role!');
        }
        $data['title'] = "Role/Create";
        $data['all_permissions'] = Permission::all();
        $data['permission_groups'] = User::getpermissionGroups();
        return view('backend.pages.roles.create', $data);
    }

    public function store(RolesRequest $request)
    {
        if (is_null($this->user) || !$this->user->can('role.create')) {
            abort(403, 'Sorry!! You are Unauthorized to create any role!');
        }
        $role = Role::create([
            'name' =>$request->get('name'),
            'guard_name' => 'admin'
        ]);
        $permissions = $request->input('permissions');
        if(!empty($permissions)) {
            $role->syncPermissions($permissions);

        }

        return redirect()->route('roles.index')->with('message', 'Role created successfull!!');;
    }

    public function show($id)
    {
        //
    }

    public function edit(Role $role)
    {
        if (is_null($this->user) || !$this->user->can('role.edit')) {
            abort(403, 'Sorry!! You are Unauthorized to edit any role!');
        }
        $data['title'] = "Role/Edit";
        $data['role'] = $role ;
        $data['all_permissions'] = Permission::all();
        $data['permission_groups'] = User::getpermissionGroups();
        return view('backend.pages.roles.edit', $data);
    }

    public function update(RolesRequest $request, Role $role)
    {
        if (is_null($this->user) || !$this->user->can('role.edit')) {
            abort(403, 'Sorry!! You are Unauthorized to edit any role!');
        }
        $params = $request->only(['name']);
        $permissions = $request->input('permissions');
        if(!empty($permissions)) {
            $role->syncPermissions($permissions);

        }
        if($role->update($params))
        {
            return redirect()->route('roles.index')->with('message', 'Role edited successfull!!');
        }
    }

    public function destroy(Role $role)
    {
        if (is_null($this->user) || !$this->user->can('role.delete')) {
            abort(403, 'Sorry!! You are Unauthorized to delete any role!');
        }
        if(!is_null($role))
        {
            $role->delete();
        }
        return redirect()->back()->with('message', 'Role deleted successfull!!');
    }
}
