<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class asn extends Model
{
    use HasFactory;
    protected $guarded = ['id_asn'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function jabatan()
    {
        return $this->belongsTo(jabatan::class, 'id_jabatan', 'id_jabatan');
    }
    public function instansi()
    {
        return $this->belongsTo(instansi::class, 'id_instansi', 'id_instansi');
    }
    public function bidang()
    {
        return $this->belongsTo(bidang::class, 'id_bidang', 'id_bidang');
    }
    public function rapat()
    {
        return $this->belongsToMany(Rapat::class, 'id_rapat', 'id_rapat');
    }
}
