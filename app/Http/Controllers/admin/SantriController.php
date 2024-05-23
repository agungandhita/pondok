<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\Wali;
use App\Models\Kelas;
use App\Models\Santri;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SantriController extends Controller
{

    public function index() {
        $wali = User::where('role', request('role', 'wali'))->get();

        $kelas = Kelas::latest()->get();

        $coba = Santri::with('kelas', 'wali',)->get();

        // dd($coba);
 
        // wali
        // kelas
        
        // dd($data);

        return view('admin.santri.index', [
            'wali' => $wali,
            'kelas' => $kelas,
            'santri' => $coba
        ]);
    }
    
    public function store(Request $request) {
        $cek = $request->validate([
            'nama' => 'required|max:255',
            'tgl_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'user' => 'required',
            'kelas' => 'required'
        ]);


        Santri::create([
            'nama' => $cek['nama'],
            'tgl_lahir' => $cek['tgl_lahir'],
            'jenis_kelamin' => $cek['jenis_kelamin'],
            'user_id' => $cek['user'],
            'kelas_id' => $cek['kelas']


        ]);
        return redirect('/santri')->with('success', 'Your operation was successful.');
    }

    public function edit(Request $request, $id) {

        $tes = $request->validate([
            'kelas' => "required"
        ]);

        Santri::find($id)->update([
            'kelas_id' => $tes['kelas']
        ]);

        return redirect('/santri')->with('success', 'Your operation was successful.');


    }

    public function destroy(Santri $santri, $id) {

        // $data = User::where('user_id', $id)->first();

        $user = Santri::findOrFail($id);

        // Hapus user
        $user->delete();

        return redirect('/santri')->with('success', 'Delete successful to the Guide');


    }

}
