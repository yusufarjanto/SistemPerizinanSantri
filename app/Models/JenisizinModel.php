<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisizinModel extends Model
{
    use HasFactory;
    protected $table = 'jenis_izin';
    protected $primaryKey = 'id_jenis_izin';
    protected $fillable = ['jenis_izin'];
}
