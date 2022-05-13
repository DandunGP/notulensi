<?php

namespace App\Http\Controllers;

use App\Models\asn;
use App\Models\bidang;
use App\Models\Hasil;
use App\Models\instansi;
use App\Models\jabatan;
use App\Models\nonasn;
use App\Models\Notulen;
use App\Models\Rapat;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $pengguna = User::count();
        $asn = asn::count();
        $nonasn = nonasn::count();
        $rapat = Rapat::count();
        $notulen = Notulen::count();
        $hasil = Hasil::count();
        $bidang = bidang::count();
        $jabatan = jabatan::count();
        $instansi = instansi::count();
        return view('dashboard.index', [
            "title" => "Dashboard",
            "active" => "Dashboard",
            "pengguna" => $pengguna,
            "asn" => $asn,
            "nonasn" => $nonasn,
            "rapat" => $rapat,
            "notulen" => $notulen,
            "hasil" => $hasil,
            "bidang" => $bidang,
            "jabatan" => $jabatan,
            "instansi" => $instansi,
        ]);
    }
}
