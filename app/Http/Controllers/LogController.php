<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function index(){
        $logs = Penjualan::with('pelanggan')->paginate(10);
        $title = 'Logs';
        return view('layouts.logs', compact('logs', 'title'));
    }
    //
}
