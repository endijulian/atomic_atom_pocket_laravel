<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\StatusDompet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index()
    {
        $dompetStatus   = StatusDompet::all();
        $categories     = Category::all();

        return view('category.index', compact('categories', 'dompetStatus'));
    }

    public function getStatus($id)
    {
        $dompetStatus   = StatusDompet::all();
        $dompets        = Category::where('status_id', $id)->get();

        return view('dompet.index', compact('dompets', 'dompetStatus'));
    }

    public function create()
    {
        $dompetStatus   = StatusDompet::all();

        return view('category.create', compact('dompetStatus'));
    }

    public function store(Request $request)
    {
        $category  = $request->all();

        $validasi = Validator::make($category, [
            'nama'           => 'required|min:5',
            'deskripsi'      => 'nullable|max:100',
        ]);

        if ($validasi->fails()) {
            return redirect()->route('category.create')->withErrors($validasi)->withInput();
        }

        Category::create($category);

        return redirect()->route('category.index')->with('status', 'Create Data Berhasil');
    }

    public function show($id)
    {
        $category         = Category::findOrFail($id);

        return view('category.detail', compact('category'));
    }

    public function edit($id)
    {
        $category         = Category::findOrFail($id);
        $dompetStatus   = StatusDompet::all();

        return view('category.edit', compact('category', 'dompetStatus'));
    }

    public function update(Request $request, $id)
    {

        $category         = Category::findOrFail($id);
        $dompetRequest  = $request->all();

        $validasi = Validator::make($dompetRequest, [
            'nama'           => 'required|min:5',
            'deskripsi'      => 'nullable|max:100',
        ]);

        if ($validasi->fails()) {
            return redirect()->route('category.edit', $id)->withErrors($validasi)->withInput();
        }

        $category->update($dompetRequest);

        return redirect()->route('category.index')->with('status', 'Update Data Berhasil');
    }

    public function destroy($id)
    {
    }

    public function inActive(Request $request, $id)
    {
        $data       = array();
        $data['status_id']   = $request->status_id;

        DB::table('categories')->where('id', $id)->update($data);

        return redirect()->route('category.index')->with('status', 'Data Non Aktif');
    }

    public function Active(Request $request, $id)
    {
        $data       = array();
        $data['status_id']   = $request->status_id;

        DB::table('categories')->where('id', $id)->update($data);

        return redirect()->route('category.index')->with('status', 'Data Aktif');
    }
}
