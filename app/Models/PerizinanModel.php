<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\JenisizinModel;
use App\Models\TahunAjaranModel;
use App\Models\User;


class PerizinanModel extends Model
{
    use HasFactory;
    protected $table = 'perizinan';
    protected $primaryKey = 'id_izin';
    protected $fillable = ['id_user','id_jenis_izin','id_tahun_ajaran','tanggal_izin','lama_izin','status'];

    public function jenis_izin()
    {
        return $this->hasOne(JenisIzinModel::class, 'id_jenis_izin','id_jenis_izin'); 
    }
    public function tahun_ajaran()
    {
        return $this->hasOne(TahunAjaranModel::class,'id_tahun_ajaran','id_tahun_ajaran');
    }
    public function users()
    {
        return $this->hasOne(User::class, 'id_users','id_users'); 
    }
}
