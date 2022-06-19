<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RolesController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index',compact(['roles']));
    }
    public function edit($id){
        $role = Role::findOrFail($id);
        return view('admin.roles.edit',compact(['role']));
    }
}
