<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\KelasModel;

class KuotaIzinModel extends Model
{
    use HasFactory;
    protected $table = 'kuota_izin';
    protected $primaryKey = 'id_kuota_izin';
    protected $fillable = ['kuota_izin','id_kelas'];
    
    
    public function kelas()
    {
        return $this->hasOne(KelasModel::class, 'id_kelas','id_kelas'); 
    }
} 
