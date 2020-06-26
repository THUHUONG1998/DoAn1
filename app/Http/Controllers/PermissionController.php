<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Permission;
use DB;
class PermissionController extends Controller
{
    public function index(Request $request)
    {
        $permission = Permission::orderBy('id','ASC')->paginate(4);    
        return view('permission.index', compact('permission'))
            ->with('i', ($request->input('page', 1) - 1) * 4);; 
    }
    public function create()
    {
        $permission = Permission::pluck('name','name')->all();
        return view('permission.create',compact('permission'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:permissions,name'
        ]);
        $input = $request->all();
        $permissions = Permission::create($input);

        return redirect()->route('permission.index')
                        ->with('success','permissions created successfully');
    }
    
    public function update(Request $request, Permission $permission)
    {
         request()->validate([
            'name' => 'required'
        ]);


        $permission->update($request->all());


        return redirect()->route('permission.index')
                        ->with('success','Permission updated successfully');
    }
    public function edit($id)
    {
        $permission = Permission::find($id);
        // $permission = Permission::pluck('name','name')->all();
        // $userRole = $permission->roles->pluck('name','name')->all();


        return view('permission.edit',compact('permission'));
    }
    public function destroy(Request $request)
    {
        $permission = Permission::findOrFail($request->id_permission);
        $permission->delete();
        return redirect()->route('permission.index')
                        ->with('success','Permssion deleted successfully');
    }
}
