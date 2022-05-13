<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bidang extends Model
{
    use HasFactory;
    protected $guarded = ['id_bidang'];

    public function bidang()
    {
        return $this->hasMany(asn::class);
    }
    public function non_bidang()
    {
        return $this->hasMany(nonasn::class);
    }
}
