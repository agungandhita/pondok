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


    
        if ($kelas) {
            $santri = Santri::whereIn('kelas_id', $kelas->pluck('kelas_id'))->with('kelas', 'wali')->get();
        } else {
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
