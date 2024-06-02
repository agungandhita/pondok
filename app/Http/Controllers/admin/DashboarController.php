<?php

namespace App\Http\Controllers\admin;

use index;
use App\Models\User;
use App\Models\Santri;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Http\Controllers\Controller;

class DashboarController extends Controller
{
    public function index()
    {

        $currentTime = Carbon::now();

        $data = User::where('role', 'wali')->get();

        $role = ['nadzom', 'quran'];
        $guru = User::whereIn('role', $role)->get();

        $santri = Santri::get();

        $murid = $santri->count();

        $jumlah = $guru->count();

        $total = $data->count();


        return view('admin.dashboard.index', [
            'title' => 'admin',
            'data' => $data,
            'totaldata' => $total,
            'semua' => $jumlah,
            'santri' => $murid,
            'currentHour' => $currentTime
        ]);
    }
}
