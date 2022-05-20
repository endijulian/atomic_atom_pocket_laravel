<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Dompet;
use App\Models\Transaksi;
use Maatwebsite\Excel\Facades\Excel;

class LaporanController extends Controller
{
    public function index()
    {
        $kategori   = Category::where('status_id', 1)->orderBy('nama', 'asc')->get();
        $dompet     = Dompet::where('status_id', 1)->orderBy('nama', 'asc')->get();

        return view('laporan.index', compact('kategori', 'dompet'));
    }

    public function ListFilter(Request $request)
    {
        $request->validate([
            'start_date'    => 'required',
            'status_id'     => 'required'
        ], [
            'start_date.required'   => 'Tanggal Awal dan Tanggal Akhir harus di pilih !!',
            'status_id.required'    => 'Pilih status terlebih dahulu !!',
        ]);

        $kategori_id    = $request->kategori_id;
        $dompet_id      = $request->dompet_id;
        $status_id      = $request->status_id;
        $start_date     = $request->start_date;
        $end_date       = $request->end_date;
        $val_status_id  = [];

        if ($status_id) {
            foreach ($status_id as $key => $val) {
                $val_status_id[] = $val;
            }
        }

        $transaksi  = Transaksi::where('kategori_id', $kategori_id)
            ->where('dompet_id', $dompet_id)
            ->where('status_id', $val_status_id)
            ->whereBetween('tanggal', [$start_date, $end_date])->get();

        return view('laporan.listFilter', compact('transaksi', 'start_date', 'end_date'));
    }

}
