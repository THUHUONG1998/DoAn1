<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use Hash;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('users.profile');
    }
    public function userProFile(Request $request){
        $profile = User::find(Auth::user()->id);
        return view('users.profile', compact('profile'));
    }
    public function updateUserProfile(Request $request){
        $user =User::find(Auth::user()->id);
        $this->validate($request, [
            'username' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'password' => 'same:confirm-password'
        ]); 
        $input = $request->all();
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = array_except($input,array('password'));    
        }

        if($request->hasFile('avatar')){
           
            $file = $request->file('avatar');
            $file_extension = $file->getClientOriginalExtension(); //lay duoi file
            if($file_extension == 'png' || $file_extension == 'jpg' || $file_extension == 'jpeg'){

            }
            else
                return redirect()->back()->with('errror', 'Hệ thống chưa hỗ trợ định dạng file mới upload!');
            $file_name = $file->getClientOriginalName();
            $random_file_name = str_random(4).'_'.$file_name;
            while(file_exists('upload/avatar/'.$random_file_name)){
                $random_file_name = str_random(4).'_'.$file_name; 
            }
            $file->move('upload/avatar',$random_file_name);
            $input['avatar'] = 'upload/avatar/'.$random_file_name;
        }
        
        else $input['avatar']= $user->avatar;
        
        $user->update($input);
        return redirect()->route('users.show', Auth::user()->id)
                        ->with('success','User updated successfully');
    }
   
}
