<?php

namespace App\Http\Controllers\backend;

use App\Models\Admin;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Requests\AdminRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminsController extends Controller
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
        if (is_null($this->user) || !$this->user->can('admin.view')) {
            abort(403, 'Sorry!! You are Unauthorized to view any admin!');
        }
        $data['title'] = "Admin";
        $data['admins'] = Admin::all();
        return view('backend.pages.admins.index', $data);
    }

    public function create()
    {
        if (is_null($this->user) || !$this->user->can('admin.create')) {
            abort(403, 'Sorry!! You are Unauthorized to view any admin!');
        }
        $data['title'] = "Admin/Create";
        $data['roles'] = Role::all();
        return view('backend.pages.admins.create', $data);
    }

    public function store(AdminRequest $request)
    {
        if (is_null($this->user) || !$this->user->can('admin.create')) {
            abort(403, 'Sorry!! You are Unauthorized to view any admin!');
        }
        $admin = Admin::create([
            'name' =>$request->get('name'),
            'email' =>$request->get('email'),
            'username' =>$request->get('username'),
            'password' =>Hash::make($request->get('password'))
        ]);
        if($request->roles){
            $admin->assignRole($request->roles);
        }
        return redirect()->route('admins.index')->with('message', 'Admin created successfull!!');;
    }

    public function show($id)
    {
        //
    }

    public function edit(Admin $admin)
    {
        if (is_null($this->user) || !$this->user->can('admin.edit')) {
            abort(403, 'Sorry!! You are Unauthorized to view any admin!');
        }
        $data['title'] = "User/Edit";
        $data['admin'] = $admin;
        $data['roles'] = Role::all();
        return view('backend.pages.admins.edit', $data);
    }

    public function update(AdminRequest $request, Admin $admin)
    {
        if (is_null($this->user) || !$this->user->can('admin.edit')) {
            abort(403, 'Sorry!! You are Unauthorized to view any admin!');
        }
        $params = $request->only(['name','email','username']);
        if($request->password){
            $params = Hash::make($request->only(['password']));
        }
        $admin->roles()->detach();
        if($request->roles){
            $admin->assignRole($request->roles);
        }
        if($admin->update($params))
        {
            return redirect()->route('admins.index')->with('message', 'Admin edited successfull!!');
        }
    }

    public function destroy(Admin $admin)
    {
        if (is_null($this->user) || !$this->user->can('admin.delete')) {
            abort(403, 'Sorry!! You are Unauthorized to view any admin!');
        }
        if(!is_null($admin))
        {
            $admin->delete();
        }
        return redirect()->back()->with('message', 'Admin deleted successfull!!');
    }
}
