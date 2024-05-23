<?php

namespace App\Http\Controllers\nadzom;

use App\Models\User;
use App\Models\Kelas;
use App\Models\Santri;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NadzomController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('role:nadzom');
    }

    public function index()
    {
        

        return view('nadzom.dashboard.index');
    }

    public function nilai()
    {
        $user = Auth::user();

        $kelas = $user->kelas;

        if ($kelas) {
            $santri = Santri::whereIn('kelas_id', $kelas->pluck('user_id'))->with('kelas', 'wali')->get();
        } else {
            $santri = collect();
        }


        // dd($santri);

        return view('nadzom.kelas', [
            'kelas' => $kelas, 
            'santri' => $santri->isEmpty() ? collect() : $santri
        ]);
    }

    public function penilaian(Request $request, $id)
    {
        $cek = $request->validate([
            'nilai_nadzom' => 'required'
        ]);

        Santri::find($id)->update([
            'nilai_nadzom' => $cek['nilai_nadzom']
        ]);

        return redirect ('/nilai');
    }
}
