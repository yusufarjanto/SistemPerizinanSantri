<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PerizinanModel;
use App\Models\JenisizinModel;
use App\Models\TahunAjaranModel;
use Auth;
use Session;

class PerizinanController extends Controller
{

    public function perizinan(Request $request)
    {
        $perizinan = PerizinanModel::select('*')
        ->with('jenis_izin')
        ->with('tahun_ajaran')
        ->orderBy('id_izin', 'DESC')
        ->get();
        // return $perizinan;
        return view('perizinan', ['perizinan' => $perizinan]);
    }
    public function Add()
    {
        $tambahIzin = PerizinanModel::create([
            'id_user' => Auth::user()->id_users
        ]);

        $id = $tambahIzin->id_izin;   //Mengambil id izin yang sudah disimpan di funtion ($createIzin).
        
        return redirect('/perizinan/tambahizin/'.$id);


    }
    public function tambahizin($id)
    {
        $izinTersimpan = PerizinanModel::select('*')
                        ->where('id_izin', $id)
                        ->first();
        
        // return $izinTersimpan->id_jenis_izin;


        $jenisIziN = JenisIzinModel::select("*")
                ->get();

        return view('tambahizin',['jenisIzin' => $jenisIziN,'izinTersimpan' => $izinTersimpan]);   //(yang pertama = buat view, dan yang kedua diambil dari dolar diatas)
    }

    public function Hapus($id)
    {
        $perizinan = PerizinanModel::where('id_izin', $id)->delete();

        Session::flash('message', '데이터가 성공적으로 삭제되었습니다! (Data Deleted Successfully !)');
        return redirect('perizinan');
    }
    public function updatejenis(Request $request)
    {
        $perizinan = PerizinanModel::where('id_izin',$request->id_izin)
                            ->update([
                                'id_jenis_izin' => $request->id_jenis_izin,
                            ]);

                            Session::flash('message', 'Berhasil Diubah');

                            return redirect ('/perizinan/jadwal_izin/'.$request->id_izin);
                            
    }
    public function jadwalizin($id)
    {
        $izinTersimpan = PerizinanModel::select('*')
                        ->where('id_izin', $id)
                        ->first();

        $tahunAjaran = TahunAjaranModel::select('*')->get();

        return view('jadwalizin',['izinTersimpan' => $izinTersimpan,'tahunAjaran' => $tahunAjaran]);
    }
    public function updatejadwal(Request $request)
    {
        $perizinan = PerizinanModel::where('id_izin',$request->id_izin)
                            ->update([
                                    'tanggal_izin' => $request->tanggal_izin,
                                    'lama_izin' => $request->lama_izin
                                    
                            ]);
        
        return redirect('/perizinan/pengikut/'.$request->id_izin);
    }
    public function pengikut($id)
    {
        $izinTersimpan = PerizinanModel::select('*')
                        ->where('id_izin', $id)
                        ->first();

        return view('pengikut',['izinTersimpan' => $izinTersimpan]);
    }
}
