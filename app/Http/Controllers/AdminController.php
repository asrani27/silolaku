<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Penghasilan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function beranda()
    {
        $data = Penghasilan::where('unit_kerja_id', Auth::user()->unitkerja->id)->orderBy('tanggal', 'DESC')->paginate(15);

        $today = Carbon::now()->format('Y-m-d');
        $month = Carbon::now()->month;
        $year = Carbon::now()->year;
        $penghasilanHariIni = Penghasilan::where('tanggal', $today)->sum('nominal');
        $penghasilanMingguIni = Penghasilan::whereBetween(
            'tanggal',
            [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]
        )->sum('nominal');
        $penghasilanBulanIni = Penghasilan::whereMonth('tanggal', $month)->whereYear('tanggal', $year)->sum('nominal');

        return view('admin.home', compact('penghasilanHariIni', 'penghasilanMingguIni', 'penghasilanBulanIni', 'data'));
    }

    public function updatePenghasilan(Request $req)
    {
        Penghasilan::find($req->id_penghasilan)->update([
            'nominal' => $req->nominal,
        ]);

        Session::flash('success', 'berhasil diupdate');
        return back();
    }
    public function profil()
    {
        $data = Auth::user()->unitkerja;
        return view('admin.profil', compact('data'));
    }
    public function updateProfil(Request $req)
    {
        $data = Auth::user()->unitkerja->update([
            'nama' => $req->nama,
            'alamat' => $req->alamat,
            'telp' => $req->telp,
            'jumlah_penduduk' => $req->jumlah_penduduk,
            'jumlah_kelurahan' => $req->jumlah_kelurahan,
            'jumlah_rt' => $req->jumlah_rt,
            'jumlah_kk' => $req->jumlah_kk,
        ]);
        Session::flash('success', 'berhasil disimpan');
        return back();
    }
    public function storePenghasilan(Request $req)
    {
        $unit_kerja_id = Auth::user()->unitkerja->id;
        $check = Penghasilan::where('unit_kerja_id', $unit_kerja_id)->where('tanggal', $req->tanggal)->first();
        if ($check == null) {
            $n = new Penghasilan;
            $n->unit_kerja_id = $unit_kerja_id;
            $n->tanggal = $req->tanggal;
            $n->nominal = $req->nominal;
            $n->save();
            Session::flash('success', 'Berhasil Disimpan');
            return back();
        } else {
            Session::flash('error', 'Tanggal Tersebut sudah ada');
            return back();
        }
    }
}
