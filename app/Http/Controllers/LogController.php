<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use Illuminate\Http\Request;

class LogController extends Controller
{
    public function index(Request $request){
        $keyword = $request->get('keyword');
        $logs = Penjualan::where('logs', 'LIKE', '%' . $keyword . '%')->with('pelanggan')->orderBy('created_at','desc')->paginate(10);
        $title = 'Logs';
        return view('layouts.logs', compact('logs', 'title'));
    }
    //
}
