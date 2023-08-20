<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\JenisizinModel;
use App\Models\OrangTuaModel;
use App\Models\PerizinanModel;
use App\Models\KelasModel;
use App\Models\User;


class ApiController extends Controller
{
    public function login(Request $request)
    {
        $login = Auth::Attempt($request->all());
        if ($login) {
            $user = Auth::user();
                // $user->api_token = Str::random(100);
                // $user->save();
                // $user->makeVisible('api_token');

                return response()->json([
                    'response_code' => 200,
                    'message' => 'login successful',
                    'content' => $user
                ]);
        }else{
            return response()->json([
                'response_code' => 404,
                'message' => 'Username and password not found',
            ]);
        }
    }
    //FUNCTION FOR JENIS IZIN
    public function createjenisizin(Request $request)
    {
        //Simpan Jenis izin
        $jenisizin = JenisizinModel::create([
            'jenis_izin' => $request->jenis_izin,
        ]);
        if ($jenisizin) {
            return response()->json([
                'response_code' => 200,
                'message' => 'data berhasil disimpan',
            ]);
        }else{
            return response()->json([
                'response_code' => 404,
                'message' => 'Gagal tersimpan',
            ]);
        }
    }

    public function updatejenisizin(Request $request)
    {
        $jenisizin = JenisizinModel::where('id_jenis_izin',$request->id_jenis_izin)
                            ->update([
                                    'jenis_izin' => $request->jenis_izin,
                            ]);
    
        if ($jenisizin) {
            return response()->json([
                'response_code' => 200,
                'message' => 'Perubahan data berhasil',
            ]);
        }else{
            return response()->json([
                'response_code' => 500,
                'message' => 'Internal server error',
            ]);
        }
    }

    public function showjenisizin()
    {
        $jenisizin = JenisIzinModel::select('*')
                    ->get();

        if ($jenisizin) {
            return response()->json([
                'response_code' => 200,
                'message' => 'Simpan data berhasil',
                'data' => $jenisizin
            ]);
        }else{
            return response()->json([
                'response_code' => 404,
                'message' => 'Gagal tersimpan',
            ]);
        }
    }
    public function delete(Request $request)
    {
        $jenisizin = JenisIzinModel::where('id_jenis_izin', $request->id_jenis_izin)
                    ->delete();
        
        if ($jenisizin) {
            return response()->json([
                'response_code' => 200,
                'message' => 'Hapus data berhasil',
            ]);
        }else{
            return response()->json([
                'response_code' => 404,
                'message' => 'Gagal Menghapus Data Maseh',
            ]);
        }
    }
    //FUNCTION FOR CLASSROOM
    public function createclass(Request $request)
    {
        $kelas = KelasModel::create([
            'nama_kelas' => $request->nama_kelas,
        ]);
        if ($kelas) {
            return response()->json([
                'response_code' => 200,
                'message' => 'Kelas berhasil disimpan',
            ]);
        }else{
            return response()->json([
                'response_code' => 404,
                'message' => 'Gagal tersimpan',
            ]);
        }
    }
    public function showclass()
    {
        $kelas = KelasModel::select('*')
                    ->get();

        if ($kelas) {
            return response()->json([
                'response_code' => 200,
                'message' => 'Simpan data berhasil',
                'data' => $kelas
            ]);
        }else{
            return response()->json([
                'response_code' => 404,
                'message' => 'Gagal tersimpan',
            ]);
        }
    }
    public function deleteclass(Request $request)
    {
        $kelas = KelasModel::where('id_kelas', $request->id_kelas)
                    ->delete();
        
        if ($kelas) {
            return response()->json([
                'response_code' => 200,
                'message' => 'Hapus kelas berhasil',
            ]);
        }else{
            return response()->json([
                'response_code' => 404,
                'message' => 'Gagal Menghapus kelas Maseh',
            ]);
        }
    }

    public function updateclass(Request $request)
    {
        $kelas = KelasModel::where('id_kelas',$request->id_kelas)
                        ->update([
                                'nama_kelas' => $request->nama_kelas,
                        ]);
    
        if ($kelas) {
            return response()->json([
                'response_code' => 200,
                'message' => 'Perubahan nama kelas berhasil',
            ]);
        }else{
            return response()->json([
                'response_code' => 500,
                'message' => 'Internal server error',
            ]);
        }
    }

    //FUNCTION FOR ORANG TUA
    public function showortu()
    {
        $orangtua = OrangTuaModel::select('*')
        ->join ('users','orang_tua.id_users','=','users.id_users')
        ->orderBy('orang_tua.id_users', 'DESC')
        ->get();
        if ($orangtua) {
            return response()->json([
                'response_code' => 200,
                'message' => 'Menampilkan data orang tua berhasil',
                'data' => $orangtua
            ]);
        }else{
            return response()->json([
                'response_code' => 404,
                'message' => 'Gagal menampilkan',
            ]);
        }
    }
    public function createparent(Request $request)
    {
        $user = User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'id_role' => 3,
            'active'=> 1
        ]);
        $id = $user->id_users;

        $parent = OrangTuaModel::create([
            'id_users' => $id,
            'nm_orang_tua' => $request->nm_orang_tua,
            'alamat_orang_tua' => $request->alamat_orang_tua,
            'no_hp_orang_tua' => $request->no_hp_orang_tua,
        ]);

        if ($parent && $user) {
            return response()->json([
                'response_code' => 201,
                'message' => 'OKE'
            ]);
        }
        else {
            return response()->json([
                'response_code' => 500,
                'message' => 'Internal Server Error'
            ]);
            }
    }
    public function updateparent(Request $request)
    {
        $ortu = OrangTuaModel::where('id_orang_tua',$request->id_orang_tua)
                        ->update([
                            'nm_orang_tua' => $request->nm_orang_tua,
                            'alamat_orang_tua' => $request->alamat_orang_tua,
                            'no_hp_orang_tua' => $request->no_hp_orang_tua,
                        ]);

        $user = User::where('id_users',$request->id_users)
                        ->update([
                            'username' => $request->username,
                            'password' => Hash::make($request->password),
                        ]);
    
        if ($ortu && $user) {
            return response()->json([
                'response_code' => 200,
                'message' => 'Perubahan Data Orang Tua berhasil',
            ]);
        }else{
            return response()->json([
                'response_code' => 500,
                'message' => 'Internal server error',
            ]);
        }
    }
    public function deleteparent(Request $request)
    {
        $parent = OrangTuaModel::where('id_orang_tua', $request->id_orang_tua)
                    ->delete();
        
        $user = User::where('id_users', $request->id_users)
        ->delete();
        if ($parent && $user) {
            return response()->json([
                'response_code' => 200,
                'message' => 'Hapus data orang tua berhasil',
            ]);
        }else{
            return response()->json([
                'response_code' => 404,
                'message' => 'Gagal Menghapus data orang tua Maseh',
            ]);
        }
    }

    //PERIZINAN SECTION
    public function showpermission()
    {
        $permission = PerizinanModel::class::select('*')
        ->join ('users','perizinan.id_user','=','users.id_users')
        ->join ('jenis_izin','perizinan.id_jenis_izin','=','jenis_izin.id_jenis_izin')
        ->orderBy('perizinan.id_user', 'DESC')
        ->get();

        if ($permission) {
            return response()->json([
                'response_code' => 200,
                'message' => 'berhasil menampilkan data',
                'data' => $permission
            ]);
        }else{
            return response()->json([
                'response_code' => 404,
                'message' => 'Gagal menampilkan data Maseh',
            ]);
        }
    }
}
