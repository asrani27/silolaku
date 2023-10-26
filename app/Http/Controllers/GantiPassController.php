<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class GantiPassController extends Controller
{
    public function admin()
    {
        return view('admin.gantipass');
    }
    public function updateAdmin(Request $req)
    {
        if (Hash::check($req->password_lama, Auth::user()->password)) {
            if ($req->password_baru != $req->confirm_password_baru) {
                Session::flash('error', 'Pasword baru tidak sama');
                return back();
            } else {
                Auth::user()->fill([
                    'password' => Hash::make($req->password_baru)
                ])->save();

                Session::flash('success', 'Pasword baru diupdate');
                return redirect('/admin/beranda');
            }
        } else {
            Session::flash('error', 'Pasword lama tidak sama');
            return back();
        }

        return view('gantipass');
    }
    public function index()
    {
        return view('gantipass');
    }
    public function update(Request $req)
    {
        if ($req->password != $req->password2) {
            Session::flash('error', 'Pasword tidak sama');
        } else {
            Auth::user()->update([
                'password' => bcrypt($req->password),
            ]);
            Session::flash('success', 'Berhasil Diupdate');
        }
        return back();
    }
}
