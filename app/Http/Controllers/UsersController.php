<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use DB;
use Hash;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // code phan trang
        $data = User::orderBy('id','ASC')->paginate(5);
        return view('users.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // code tao database
        // code lay du lieu vao database
        $this->validate($request, [
            'username' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
         //  'roles' => 'required'
        ]);


        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        if($request->hasFile('avatar'))
        {
            $file = $request->file('avatar');
            $file_extension = $file->getClientOriginalExtension(); // Lấy đuôi của file
            if($file_extension == 'png' || $file_extension == 'jpg' || $file_extension == 'jpeg'){
                    
                    }
                    else return redirect()->back()->with('error','Chưa hỗ trợ định dạng file vừa upload.');

            $file_name = $file->getClientOriginalName();
            $random_file_name = str_random(4).'_'.$file_name;
            while(file_exists('upload/avatar/'.$random_file_name)){
                $random_file_name = str_random(4).'_'.$file_name;
            }
            $file->move('upload/avatar',$random_file_name);
            // $file_upload = new File();
            // $file_upload->name = $random_file_name;
            // $file_upload->link = 'upload/posts/'.$random_file_name;
            // $file_upload->post_id = $avatar->id;
            // $file_upload->save();
            $input['avatar'] = 'upload/avatar/'.$random_file_name;
        } 
        else $input['avatar']='';


        $user = User::create($input);
        $user->assignRole($request->input('roles'));


        return redirect()->route('users.index')
                        ->with('success','User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();


        return view('users.edit',compact('user','roles','userRole'));
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
        $user = User::find($id);
        $this->validate($request, [
            'username' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);


        $input = $request->all();
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = array_except($input,array('password'));    
        }
        if($request->hasFile('avatar'))
        {
            $file = $request->file('avatar');
            $file_extension = $file->getClientOriginalExtension(); // Lấy đuôi của file
            if($file_extension == 'png' || $file_extension == 'jpg' || $file_extension == 'jpeg'){
                    
                    }
                    else return redirect()->back()->with('error','Chưa hỗ trợ định dạng file vừa upload.');

            $file_name = $file->getClientOriginalName();
            $random_file_name = str_random(4).'_'.$file_name;
            while(file_exists('upload/avatar/'.$random_file_name)){
                $random_file_name = str_random(4).'_'.$file_name;
            }
            $file->move('upload/avatar',$random_file_name);
            $input['avatar'] = 'upload/avatar/'.$random_file_name;
        } 
        else $input['avatar']=$user->avatar;


        
        $user->update($input);
        DB::table('model_has_roles')->where('model_id',$id)->delete();
        $user->assignRole($request->input('roles'));
        return redirect()->route('users.index')
                        ->with('success','User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id
        )->delete();
        return redirect()->route('users.index')
                        ->with('success','User deleted successfully');
    }
}
