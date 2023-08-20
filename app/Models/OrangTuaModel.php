<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class OrangTuaModel extends Model
{
    use HasFactory;
    protected $table = 'orang_tua';
    protected $primaryKey = 'id_orang_tua';
    protected $fillable = ['nm_orang_tua','no_hp_orang_tua','id_users','alamat_orang_tua'];

    public function users()
    {
        return $this->hasOne(User::class, 'id_users','id_users'); 
    }
}
