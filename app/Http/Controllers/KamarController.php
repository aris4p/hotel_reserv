<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class KamarController extends Controller
{
    public function index()
    {
        return view('admin.kamar',[
            'title' => "Kamar"
        ]);
    }

    public function datatable()
    {
        $kamars = Kamar::query();
        return DataTables::of($kamars)
        ->addIndexColumn()
        ->addColumn('action', function($kamar){
            return '<button>Edit</button>';
        })
        ->rawColumns(['action'])
        ->make(true);
    }

    public function add(Request $request)
    {
        $kamar = Kamar::create([
            'nama' => $request->nama,
            'tipe' => $request->tipe,
            'harga' => $request->harga,
            'gambar' => $request->gambar,
        ]);
        return response()->json(['message' => "Success", 'data' => $kamar]);
    }
}
