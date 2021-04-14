<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class Login extends Controller
{
    public function index(){
        return view('login');
    }

    public function register(Request $request){
        DB::table('tbl_user')->insert([
            'nama_user' => $request->nama,
            'email'     =>$request->email,
            'password'  =>$request->password
        ]);
        return redirect('login');
    }
    public function masuk(Request $request){
        $user = DB::table('tbl_user')->where('email',$request->email)->first();
        if($user->password == $request->password){
                $request->session()->put('id_user',$user->id);
            echo "data di simpan dengan session id = ".$request->session()->get('id');
            return redirect('/');
        }
        else{
            echo "anda gagal login";
        }
    }
    public function keluar(){
        Session::forget('id_user');
        return redirect('/');
    }
}
