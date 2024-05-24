<?php

namespace App\Http\Controllers\wali;

use App\Models\Santri;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WaliController extends Controller
{
    public function index() {
       $user = Auth::user();

       $user = Auth::user();

       if ($user->role === 'wali') {
           $santri = Santri::where('user_id', $user->user_id)->with('wali')->get();
       } else {
           $santri = collect();
       }

    //    dd($santri);

    return view('wali.dashboard.index', [
        'santri' => $santri
    ]);
    }
}
