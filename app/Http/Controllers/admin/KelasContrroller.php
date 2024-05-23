<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\Kelas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Contracts\Service\Attribute\Required;

class KelasContrroller extends Controller
{
    public function index()
    {

        $data = Kelas::latest()->get();

        $user = User::whereIn('role', ['nadzom', 'quran'])->get();


        // dd($data);

        return view('admin.kelas.index', (compact('data', 'user')));
    }

    public function store(Request $request)
    {
        $cek = $request->validate([
            'nama_kelas' => 'required|max:255',
            'user' => 'required'

        ]);

        Kelas::create([
            'nama_kelas' => $cek['nama_kelas'],
            'user_id' => $cek['user']
        ]);

        return redirect('/kelas');
    }

    // public function guru(Request $request)
    // {
    //     $cek = $request->validate([
    //         'user' => 'required'
    //     ]);

    //     Kelas::create([
    //         'user_id' => $cek['user'],
    //     ]);
    // }

    public function update(Request $request, $id)
    {


        $cek = $request->validate([
            'nama_kelas' => 'required',
            'user' => 'required'
        ]);

        Kelas::find($id)->update([
            'nama_kelas' => $cek['nama_kelas'],
            'user_id' => $cek['user']
        ]);

        return redirect('/kelas');
    }

    public function destroy(Kelas $kelas, $id)
    {

        // $data = User::where('user_id', $id)->first();

        $user = Kelas::findOrFail($id);

        // Hapus user
        $user->delete();

        return redirect('/kelas')->with('success', 'Delete successful to the Guide');
    }
}
