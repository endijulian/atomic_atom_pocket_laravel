<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Dompet;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class DompetMasukController extends Controller
{
    public function index()
    {
        $transaksi  = Transaksi::where('status_id', 1)->get();

        return view('dompetMasuk.index', compact('transaksi'));
    }

    public function create()
    {
        $kategori   = Category::where('status_id', 1)->orderBy('nama', 'asc')->get();
        $dompet     = Dompet::where('status_id', 1)->orderBy('nama', 'asc')->get();

        return view('dompetMasuk.create', compact('kategori', 'dompet'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'deskripsi' => 'nullable|max:100',
            'nilai'     => 'required'
        ]);

        $lastTransactionIn  = Transaksi::where('status_id', 1)->orderBy('created_at', 'desc')->first();

        if (isset($lastTransactionIn->kode)) {
            $codeLast           = substr($lastTransactionIn->kode, -8);
        }
        $transaksi          = new Transaksi();

        if (isset($lastTransactionIn)) {
            $transaksi->kode        = 'WIN' . str_pad($codeLast + 1, 8, "0", STR_PAD_LEFT);
        } else {
            $transaksi->kode        = 'WIN' . str_pad(1, 8, "0", STR_PAD_LEFT);
        }

        $transaksi->status_id   = 1;
        $transaksi->tanggal     = $request->tanggal;
        $transaksi->deskripsi   = $request->deskripsi;
        $transaksi->nilai       = $request->nilai;
        $transaksi->dompet_id   = $request->dompet_id;
        $transaksi->kategori_id = $request->kategori_id;

        $transaksi->save();

        return redirect()->route('dompetmasuk.index')->with('status', 'Berhasil tambah data dompet masuk');
    }
}
