<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function getlogin(){
        return view('admin.admin_login');
    }

    public function getlogout(){
        Session::flush();
        return redirect()->route('admin.getlogin')->with('flash_message_success','đăng xuất thành công');
    }

    public function postlogin(Request $request){
        if($request->isMethod('post')){
            $data = $request->input();
            if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password'],'admin'=>'1'])){
//                echo "duoc roi";die;
//                Session::put('adminSession',$data['email']);
                return redirect()->route('admin.dashboard');
            }
            else{
//                echo "khong duoc roi";die;
                return redirect()->back()->with('flash_message_error','nhập sai mật khẩu hoặc email');
            }
        }
//        return view('admin.admin_login');
    }

    public function dashboard(){
        return view('admin.dashboard');
    }

    public function settings(){
        return view('admin.settings');
    }

    public function chkPassword(Request $request){
        $data = $request->all();
        $current_password = $data['current_pwd'];
        $check_password = User::where(['admin'=>'1'])->first();
        if(Hash::check($current_password,$check_password->password)){
            echo "true"; die;
        }
        else{
            echo "false"; die;
        }
    }

    public function postUpdatePassword(Request $request){
        if ($request->isMethod('post')){
            $data = $request->all();
            $check_password = User::where(['email'=>Auth::user()->email])->first();
            $current_password = $data['current_pwd'];
            if(Hash::check($current_password,$check_password->password)){
                $password = bcrypt($data['new_pwd']);
                User::Where('id','1')->update(['password'=>$password]);
                return redirect()->route('admin.settings')->with('flash_message_success','cập nhật mật khẩu thành công');
            }
            else{
                return redirect()->route('admin.settings')->with('flash_message_error','cập nhật mật khẩu không thành công');
            }
        }
    }

}
