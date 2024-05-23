<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Wali;


class WaliController extends Controller
{
    public function index(){

        $data = User::where('role', 'wali')->get();


        return view ('admin.akun.wali', compact('data'));
    }

    public function store(Request $request) {
        $cek = $request->validate([
            'nama' => 'required|max:255',
            'email' => 'required|email:rfc,dns|unique:users',
            'password' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
            'role' => 'required',
        ]);

        $cek['password'] = bcrypt($cek['password']);

        User::create([
            'nama' => $cek['nama'],
            'email' => $cek['email'],
            'password' => $cek['password'],
            'alamat' => $cek['alamat'],
            'telepon' => $cek['telepon'],
            'role' => $cek['role'],

        ]);
        return redirect('/akun-wali')->with('success', 'Your operation was successful.');
    }

    public function edit(Request $request, $id) {

        $cek = $request->validate([
            'email' => 'required|email:rfc,dns|unique:users',
            'nama' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
        ]);

        User::where('user_id', $id);

        User::find($id)->update([
            'email' => $cek['email'],
            'nama' => $cek['nama'],
            'alamat' => $cek['alamat'],
            'telepon' => $cek['telepon'],
        ]);

        return redirect('/akun-wali');

    }


    public function destroy(User $user, $id) {

        // $data = User::where('user_id', $id)->first();

        $user = User::findOrFail($id);

        // Hapus user
        $user->delete();

        return redirect('/akun-wali')->with('success', 'Delete successful to the Guide');


    }

}
