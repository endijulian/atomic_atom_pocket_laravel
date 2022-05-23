<?php

namespace App\Http\Controllers;

use App\Models\Dompet;
use App\Models\StatusDompet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class DompetController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dompetStatus   = StatusDompet::all();
        $dompets        = Dompet::all();

        // $valueTime = '2 Jam 8 Menit 11 Detik';
        $timeVal = 7691;
        $tmeOut  = date('H:i:s', $timeVal);


        return view('dompet.index', compact('dompets', 'dompetStatus', 'tmeOut'));
    }

    public function getStatus($id)
    {
        $dompetStatus   = StatusDompet::all();
        $dompets        = Dompet::where('status_id', $id)->get();

        return view('dompet.index', compact('dompets', 'dompetStatus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dompetStatus   = StatusDompet::all();

        return view('dompet.create', compact('dompetStatus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dompet  = $request->all();

        $validasi = Validator::make($dompet, [
            'nama'           => 'required|min:5',
            'deskripsi'      => 'nullable|max:100',
            'referensi'      => 'nullable',
        ]);

        if ($validasi->fails()) {
            return redirect()->route('dompet.create')->withErrors($validasi)->withInput();
        }

        Dompet::create($dompet);

        return redirect()->route('dompet.index')->with('status', 'Create Data Berhasil');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dompet         = Dompet::findOrFail($id);

        return view('dompet.detail', compact('dompet'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dompet         = Dompet::findOrFail($id);
        $dompetStatus   = StatusDompet::all();

        return view('dompet.edit', compact('dompet', 'dompetStatus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $dompet         = Dompet::findOrFail($id);
        $dompetRequest  = $request->all();

        $validasi = Validator::make($dompetRequest, [
            'nama'           => 'required|min:5',
            'deskripsi'      => 'nullable|max:100',
            'referensi'      => 'nullable',
        ]);

        if ($validasi->fails()) {
            return redirect()->route('dompet.edit', $id)->withErrors($validasi)->withInput();
        }

        $dompet->update($dompetRequest);

        return redirect()->route('dompet.index')->with('status', 'Update Data Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }

    public function inActive(Request $request, $id)
    {
        $data       = array();
        $data['status_id']   = $request->status_id;

        DB::table('dompets')->where('id', $id)->update($data);

        return redirect()->route('dompet.index')->with('status', 'Data Non Aktif');
    }

    public function Active(Request $request, $id)
    {
        $data       = array();
        $data['status_id']   = $request->status_id;

        DB::table('dompets')->where('id', $id)->update($data);

        return redirect()->route('dompet.index')->with('status', 'Data Aktif');
    }
}
