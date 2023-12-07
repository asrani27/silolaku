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
        $period = now()->subMonths(12)->monthsUntil(now());

        $duabelasbulan = [];
        foreach ($period as $date) {
            $duabelasbulan[] = [
                'namabulan' => $date->translatedFormat('F'),
                'month' => $date->month,
                'year' => $date->year,
                'penghasilan' => Penghasilan::where('unit_kerja_id', Auth::user()->unitkerja->id)->whereMonth('tanggal', $date->month)->whereYear('tanggal', $date->year)->sum('nominal'),
            ];
        }
        $bulantahun = array_reverse($duabelasbulan);

        $tahun = range(Carbon::now()->year, 2022);
        $tahunterakhir = [];
        foreach ($tahun as $y) {
            $tahunterakhir[] = [
                'year' => $y,
                'penghasilan' => Penghasilan::where('unit_kerja_id', Auth::user()->unitkerja->id)->whereYear('tanggal', $y)->sum('nominal'),
            ];
        }

        $data = Penghasilan::where('unit_kerja_id', Auth::user()->unitkerja->id)->orderBy('tanggal', 'DESC')->paginate(15);

        $today = Carbon::now()->format('Y-m-d');
        $month = Carbon::now()->month;
        $year = Carbon::now()->year;
        $penghasilanHariIni = Penghasilan::where('unit_kerja_id', Auth::user()->unitkerja->id)->where('tanggal', $today)->sum('nominal');
        $penghasilanMingguIni = Penghasilan::where('unit_kerja_id', Auth::user()->unitkerja->id)->whereBetween(
            'tanggal',
            [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]
        )->sum('nominal');
        $penghasilanBulanIni = Penghasilan::where('unit_kerja_id', Auth::user()->unitkerja->id)->whereMonth('tanggal', $month)->whereYear('tanggal', $year)->sum('nominal');

        $grafik = [
            [
                'label' => 'Januari',
                'x' => 0,
                'y' => (int) Penghasilan::whereMonth('tanggal', '01')->whereYear('tanggal', $year)->sum('nominal'),
            ],
            [
                'label' => 'Februari',
                'x' => 1,
                'y' => (int) Penghasilan::whereMonth('tanggal', '02')->whereYear('tanggal', $year)->sum('nominal'),
            ],
            [
                'label' => 'Maret',
                'x' => 2,
                'y' => (int) Penghasilan::whereMonth('tanggal', '03')->whereYear('tanggal', $year)->sum('nominal'),
            ],
            [
                'label' => 'April',
                'x' => 3,
                'y' => (int) Penghasilan::whereMonth('tanggal', '04')->whereYear('tanggal', $year)->sum('nominal'),
            ],
            [
                'label' => 'Mei',
                'x' => 4,
                'y' => (int) Penghasilan::whereMonth('tanggal', '05')->whereYear('tanggal', $year)->sum('nominal'),
            ],
            [
                'label' => 'Juni',
                'x' => 5,
                'y' => (int) Penghasilan::whereMonth('tanggal', '06')->whereYear('tanggal', $year)->sum('nominal'),
            ],
            [
                'label' => 'Juli',
                'x' => 6,
                'y' => (int) Penghasilan::whereMonth('tanggal', '07')->whereYear('tanggal', $year)->sum('nominal'),
            ],
            [
                'label' => 'Agustus',
                'x' => 7,
                'y' => (int) Penghasilan::whereMonth('tanggal', '08')->whereYear('tanggal', $year)->sum('nominal'),
            ],
            [
                'label' => 'September',
                'x' => 8,
                'y' => (int) Penghasilan::whereMonth('tanggal', '09')->whereYear('tanggal', $year)->sum('nominal'),
            ],
            [
                'label' => 'Oktober',
                'x' => 9,
                'y' => (int) Penghasilan::whereMonth('tanggal', '10')->whereYear('tanggal', $year)->sum('nominal'),
            ],
            [
                'label' => 'November',
                'x' => 10,
                'y' => (int) Penghasilan::whereMonth('tanggal', '11')->whereYear('tanggal', $year)->sum('nominal'),
            ],
            [
                'label' => 'Desember',
                'x' => 11,
                'y' => (int) Penghasilan::whereMonth('tanggal', '12')->whereYear('tanggal', $year)->sum('nominal'),
            ]
        ];
        return view('admin.home', compact('tahunterakhir', 'penghasilanHariIni', 'penghasilanMingguIni', 'penghasilanBulanIni', 'data', 'grafik', 'year', 'bulantahun'));
    }

    public function delete($id)
    {
        Penghasilan::find($id)->delete();
        return back();
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
            $check->update([
                'nominal' => $req->nominal
            ]);
            Session::flash('success', 'Berhasil Di Update');
            return back();
        }
    }
}
