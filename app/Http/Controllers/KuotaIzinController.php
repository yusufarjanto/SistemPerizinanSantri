<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KelasModel;
use App\Models\KuotaIzinModel;
use Session;

class KuotaIzinController extends Controller
{
    public function kuotaizin()
    {
        $kuotaizin = KuotaIzinModel::select('*')
        ->with('kelas')
        ->orderBy('id_kelas', 'DESC')
        ->get();
        // return $kuotaizin;
        return view('kuotaizin', ['kuotaizin' => $kuotaizin]);
    }
    public function createkuotaizin()
    {
        $kuotaizin = KuotaIzinModel::select('*')
        ->with('kelas')
        ->orderBy('id_kelas', 'DESC')
        ->get();
        $kelas = KelasModel::select('*')
        ->get();
        // return $kuotaizin;
        return view('tambahkuotaizin', ['kuotaizin' => $kuotaizin,'kelas' =>$kelas]);
    }
    public function savekuotaizin(Request $request)
    {
        $kuotaizin = KuotaIzinModel::create([
            'id_kelas' => $request->id_kelas,
            'kuota_izin' => $request->kuota_izin
        ]);
        Session::flash('message', 'Wodzra nyatakakawo ɖo dzidzedzetɔe');
        return redirect('kuotaizin');
    }
    public function hapus($id)
    {
        $kuotaizin = KuotaIzinModel::where('id_kuota', $id)->delete();

        Session::flash('message', '데이터가 성공적으로 삭제되었습니다! (Data Deleted Successfully !)');
        return redirect('kuotaizin');
    }
    public function editkuota($id)
    {
        $kuotaizin = KuotaIzinModel::select('*')
        ->where('id_Kuota', $id)->first();

        $kuotaizin1 = KuotaIzinModel::select('*')
        ->with('kelas')
        ->orderBy('id_kelas', 'DESC')
        ->get();
        
        $kelas = KelasModel::class::select('*')->get();

        return view('editkuota',['kuotaizin' => $kuotaizin,'kelas' => $kelas]);
    }
    public function updatekuota(Request $request)
    {
        $kuotaizin = KuotaIzinModel::where('id_kuota',$request->id_kuota)
        ->update([
            'id_kelas' => $request->id_kelas,
            'kuota_izin' => $request->kuota_izin
        ]);

        Session::flash('message', 'Berhasil Diubah lurr');

        return redirect ('kuotaizin');
    }
}
