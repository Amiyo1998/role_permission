<?php

namespace App\Http\Controllers\backend;

use App\Models\Blog;
use App\Models\Admin;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;

class DashboardController extends Controller
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
        if (is_null($this->user) || !$this->user->can('dashboard.view')) {
            abort(403, 'Sorry!! You are Unauthorized to view any dashboard!');
        }
        $data['total_roles'] = count(Role::select('id')->get());
        $data['total_admins'] = count(Admin::select('id')->get());
        $data['total_permissions'] = count(Permission::select('id')->get());
        $data['total_blogs'] = count(Blog::select('id')->get());
        return view('backend.pages.dashboard.index', $data);
    }
}
