<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\DetailPenjualan;
use Illuminate\Support\Facades\Auth;

class StrukController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $detail = DetailPenjualan::first();
        $penjualan = Penjualan::with('pelanggan')
            ->orderBy('penjualan_id','DESC')
            // ->where('struk', 'LIKE', '%' . $keyword . '%')
            ->get();
        $title = 'Riwayat Transaksi';
        $now = now();
        $currentTime = $now->format('Y-m-d');
        return view('layouts.struk-kelola', compact('penjualan', 'title', 'currentTime', 'detail'));
    }
    public function show($id)
    {
        $datas = Penjualan::with(['detailPenjualans', 'pelanggan'])->findOrFail($id);
        // dd($datas);
        $detail = $datas->detailPenjualans;
        $penjualan = Penjualan::with('pelanggan')->first();
        $detaill = DetailPenjualan::where('penjualan_id', $id)->first();
        $noStruk = $detaill->struk;
        $title = 'History';
        if ($datas) {
            $totalHargaKeseluruhan = 0;
            $pembelianDetails = []; // Inisialisasi array untuk menyimpan detail pembelian

            foreach ($detail as $item) {
                $produk = Produk::findOrFail($item->produk_id);
                $hargaProduk = $produk->harga;
                $totalHargaItem = $item->jumlah * $hargaProduk;
                $totalHargaKeseluruhan += $totalHargaItem;

                // Tambahkan detail pembelian beserta nama produk ke dalam array pembelianDetails
                $pembelianDetails[] = [
                    'produk' => $produk->nama_produk,
                    'jumlah' => $item->jumlah,
                    'harga' => $hargaProduk,
                    'subtotal' => $totalHargaItem,
                ];
            }

            $pelanggan = $penjualan->pelanggan;
            $namaPelanggan = $penjualan->pelanggan->nama_pelanggan;
            $title = 'Struk View';
            $currentTime = Carbon::now()->format('Ymd');
            $bayar = $detail->first()->bayar;

            $dataPrint = [
                'noStruk' => $noStruk,
                'petugasName' => Auth::user()->name,
                'pelanggan' => $pelanggan,
                'data_pelanggan' => $namaPelanggan,
                'pembelianDetail' => $pembelianDetails,
                'totalHargaKeseluruhan' => $totalHargaKeseluruhan,
                'title' => $title,
                'currentTime' => $currentTime,
                'struk' => $detail,
                'bayar' => $bayar,
                'kembalian' => $bayar - $totalHargaKeseluruhan
            ];
            return view('layouts.struk', $dataPrint);
        } else {
            return response()->json(['message' => 'Struk not found'], 404);
        }
    }
}
