<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IzinModel extends Model
{
    use HasFactory;
    protected $table = 'izin';
    protected $primaryKey = 'id_izin';
    protected $fillable = ['id_orang_tua','tanggal_izin','tanggal_masuk','keterangan'];
}
