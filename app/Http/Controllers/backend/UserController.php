<?php

namespace App\Http\Controllers\backend;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    public function index()
    {
        $data['title'] = "User";
        $data['users'] = User::all();
        return view('backend.pages.users.index', $data);
    }

    public function create()
    {
        $data['title'] = "User/Create";
        $data['roles'] = Role::all();
        return view('backend.pages.users.create', $data);
    }

    public function store(UserRequest $request)
    {
        $user = User::create([
            'name' =>$request->get('name'),
            'email' =>$request->get('email'),
            'password' =>Hash::make($request->get('password'))
        ]);
        if($request->roles){
            $user->assignRole($request->roles);
        }
        return redirect()->route('users.index')->with('message', 'User created successfull!!');;
    }

    public function show($id)
    {
        //
    }

    public function edit(User $user)
    {
        $data['title'] = "User/Edit";
        $data['user'] = $user;
        $data['roles'] = Role::all();
        return view('backend.pages.users.edit', $data);
    }

    public function update(UserRequest $request, User $user)
    {
        $params = $request->only(['name','email']);
        if($request->password){
            $params = Hash::make($request->only(['password']));
        }
        $user->roles()->detach();
        if($request->roles){
            $user->assignRole($request->roles);
        }
        if($user->update($params))
        {
            return redirect()->route('users.index')->with('message', 'User edited successfull!!');
        }
    }

    public function destroy(User $user)
    {
        if(!is_null($user))
        {
            $user->delete();
        }
        return redirect()->back()->with('message', 'User deleted successfull!!');
    }
}
