<?php

namespace App\Http\Controllers\quran;

use App\Models\Santri;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class QuranController extends Controller
{
    public function index(){
        return view('quran.dashboard.index');
    }

    public function nilai() {
        $user = Auth::user();
        $kelas = $user->kelas;


    
        // Periksa apakah ada kelas yang ditemukan untuk pengguna
        if ($kelas) {
            // Jika ada kelas, ambil data santri yang terkait dengan kelas yang dimiliki oleh pengguna
            $santri = Santri::whereIn('kelas_id', $kelas->pluck('kelas_id'))->with('kelas', 'wali')->get();
        } else {
            // Jika tidak ada kelas yang ditemukan, set $santri sebagai koleksi kosong
            $santri = collect();
        }
    
        // dd($santri);



        return view('quran.kelas', [
            'kelas' => $kelas, 
            'santri' => $santri
        ]); 
    }


    public function skor(Request $request, $id)
    {
        $cek = $request->validate([
            'nilai_quran' => 'required'
        ]);

        Santri::find($id)->update([
            'nilai_quran' => $cek['nilai_quran']
        ]);

        return redirect ('/nilai-santri');
    }

}
