<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use index;

class DashboarController extends Controller
{
    public function index() {
        return view('admin.dashboard.index', [
            'title' => 'admin'
        ]);
    }
}