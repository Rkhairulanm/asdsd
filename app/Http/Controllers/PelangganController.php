<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;
use App\Models\DetailPenjualan;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class PelangganController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $pelanggan = Pelanggan::where('nama_pelanggan', 'LIKE', '%' . $keyword . '%')->orderBy('created_at', 'DESC')->with('penjualan.detailPenjualans')->paginate(15);
        $detail = DetailPenjualan::with('produk')->get();
        $title = 'Kelola Pelanggan';
        return view('layouts.pelanggan', compact('pelanggan', 'title', 'detail'));
    }

    public function show($id)
    {
        $pelanggan = Pelanggan::with('penjualan')->findOrFail($id);
        $detail = DetailPenjualan::with('produk')->where('penjualan_id', $id)->get();
        $title = 'Kelola Pelanggan';
        return view('layouts.detail_pelanggan', compact('pelanggan', 'title', 'detail'));
    }


    public function edit($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $title = 'Kelola Pelanggan';
        return view('layouts.pelanggan-edit', compact('pelanggan', 'title'));
    }
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->update($data);
        if ($pelanggan) {
            Session::flash('status', 'info');
            Session::flash('message', 'Pelanggan Berhasil Di Edit.');
        }
        return redirect('/pelanggan ');
    }
    public function destroy($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);
        $pelanggan->delete();
        if ($pelanggan) {
            Session::flash('status', 'info');
            Session::flash('message', 'Pelanggan berhasil Dihapus.');
        }
        return redirect('/pelanggan ');
    }
    public function pembayaran(Request $request, $id)
    {
        $request->validate([
            'pembayaran' => 'required|numeric|min:1',
        ]);

        // Temukan pembelian berdasarkan penjualan_id
        $detail = DetailPenjualan::where('penjualan_id', $id)->firstOrFail();

        // Dapatkan nilai pembayaran yang ada
        $pembayaranLama = $detail->bayar;

        // Dapatkan nilai pembayaran yang baru dari input pengguna
        $pembayaranBaru = $request->pembayaran;

        // Hitung total pembayaran baru dengan menambahkan nilai pembayaran baru ke nilai pembayaran yang lama
        $totalPembayaranBaru = $pembayaranLama + $pembayaranBaru;

        // Perbarui kolom bayar dengan total pembayaran baru
        $detail->update([
            'bayar' => $totalPembayaranBaru,
        ]);

        if ($detail) {
            Session::flash('status', 'info');
            Session::flash('message', 'Pembayaran Berhasil.');
        }

        // Redirect kembali ke halaman detail pelanggan dengan pesan sukses
        return redirect('/pelanggan-detail/'.$id);
    }

    //
}
