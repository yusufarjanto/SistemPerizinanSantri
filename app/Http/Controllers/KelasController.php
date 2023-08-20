<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KelasModel;
use Session;


class KelasController extends Controller
{
    public function showkelas()
    {
        $kelas = KelasModel::select('*')
                    ->get();
        
        return view('kelas',['kelas' => $kelas]);
    }

    public function createclass()
    {
        return view('createclass');
    }

    public function saveclass(Request $request)
    {
        $kelas = KelasModel::create([
            'nama_kelas' => $request->nama_kelas,
        ]);
        Session::flash('message', '데이터가 성공적으로 저장되었습니다!(Data saved successfully!)');
        return redirect('kelas');
    }
    public function deleteclass($id)
    {
        $kelas = KelasModel::where('id_kelas', $id)->delete();

        Session::flash('message', 'Kelas Batal Dibuat!');

        return redirect ('/kelas');
    }
    public function editclass($id)
    {
        $kelas = KelasModel::select('*')
        ->where('id_kelas', $id)->first();

        return view('editclass',['kelas' => $kelas]);
    }
    public function updateclass(Request $request)
    {
        $kelas = KelasModel::where('id_kelas',$request->id_kelas)
        ->update([
            'nama_kelas' => $request->nama_kelas,
        ]);

        Session::flash('message', 'Kelas Berhasil Diubah');

        return redirect ('/kelas');
    }
}
