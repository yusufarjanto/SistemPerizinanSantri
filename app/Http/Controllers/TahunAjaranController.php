<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TahunAjaranModel;
use Session;


class TahunAjaranController extends Controller
{
    public function tampiltahunajaran()
    {
        $tahunhajaran = TahunAjaranModel::select('*')
                            ->get();
        return view('tahunajaran',['tahunajaran' => $tahunhajaran]);
    }

    public function tambahtahunajaran()
    {
        $tahunhajaran = TahunAjaranModel::select('*')
                            ->get();
        return view('tambahtahunajaran',['tahunajaran' => $tahunhajaran]);
    }

    public function simpantahunajaran(Request $request)
    {
        $id_tahun_ajaran = TahunAjaranModel::create([
            'tahun_ajaran' => $request->tahun_ajaran,
            'semester' => $request->semester,
        ]);
        Session::flash('message', 'Succesfully created');
        return redirect ('/tahunajaran');
    }

    public function edittahunajaran($id)
    {
        $tahunhajaran = TahunAjaranModel::select('*')
        ->where('id_tahun_ajaran', $id)->first();

        return view('edittahunajaran',['tahunajaran' => $tahunhajaran]);
    }
    public function updatetahunajaran(Request $request)
    {
        $tahunhajaran = TahunAjaranModel::where('id_tahun_ajaran',$request->id_tahun_ajaran)
        ->update([
            'tahun_ajaran' => $request->tahun_ajaran,
            'semester' => $request->semester
        ]);

        Session::flash('message', 'Berhasil Diubah');

        return redirect ('tahunajaran');
    }

    public function delete($id)
    {
        $tahunajaran = TahunAjaranModel::where('id_tahun_ajaran', $id)->delete();

        Session::flash('message', 'Data LO Udah Dilenyapkan selamanya!');

        return redirect ('tahunajaran');
    }
}
