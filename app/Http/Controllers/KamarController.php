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
         ->addColumn('action', function ($row) {
                // kita tambahkan button edit dan hapus
                $btn = '<a href="'.route('edit-kamar', $row->id).'"  class="edit btn btn-primary btn-sm editProduk"><i class="fa fa-edit"></i>Edit</a>';

                $btn .= ' <a href="javascript:void(0)" data-id="' . $row->id . '" class="btn btn-danger btn-sm deleteProduk"><i class="fa fa-trash"></i>Delete</a>';

                return $btn;
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
