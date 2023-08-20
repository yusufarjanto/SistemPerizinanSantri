<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrangTuaModel;
use App\Models\SantriModel;
use App\Models\IzinModel;
use Session;
use PDF;


class AdminController extends Controller
{
    //TAMPIL PERIZINAN

    public function index()
    {
        return view('index');
    }
    public function perizinan(Request $request)
    {
        // $ortu = OrangTuaModel::select('*')
        //         ->get();
        // $santri =  SantriModel::select('*')
        // ->get();
        $izin =  IzinModel::select('*')
        ->get();
        return view('perizinan', ['izin' => $izin]);
    }
    public function simpanizin(Request $request)
    {
        $id = IzinModel::create([
            'id_orang_tua' => $request->id_orang_tua,
            'tanggal_izin' => $request->tanggal_izin,
            'tanggal_masuk' => $request->tanggal_masuk,
            'keterangan' => $request->keterangan
        ]);
        Session::flash('message', 'Succesfully created');
        return redirect ('perizinan');
    }
    public function tambahizin(Request $request)
    {
        $izin = IzinModel::select('*')
                ->first();
        return view('tambahizin', ['izin' => $izin]);
    }

    public function editizin($id)
    {
        $izin = IzinModel::select('*') 
                            ->where('id_izin', $id)->first();

        return view ('editizin',['izin' => $izin]);
    }

    public function update(Request $request)
    {
        $idizin = $request->id_izin;
        $izin = IzinModel::where('id_izin',$idizin)
                            ->update([
                                'id_orang_tua' => $request->id_orang_tua,
                                'tanggal_izin' => $request->tanggal_izin,
                                'tanggal_masuk' => $request->tanggal_masuk,
                                'keterangan' => $request->keterangan
                            ]);

                            Session::flash('message', 'Berhasil Diubah');

                            return redirect ('perizinan');
                            
    }

    public function hapusizin($id)
    {
        $izin = IzinModel::where('id_izin', $id)->delete();

        Session::flash('message', 'Data LO Udah Dilenyapkan selamanya!');

        return redirect ('perizinan');
    }

    public function cetakperizinan()
    {
    $izin = IzinModel::select('*')
                ->get();

    $pdf = PDF::loadView('cetakperizinan', ['perizinan' => $izin]);
    return $pdf->stream('Laporan-Data-Santri.pdf');
    }

}
