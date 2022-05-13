<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class instansi extends Model
{
    use HasFactory;

    protected $guarded = ['id_instansi'];

    public function instansi()
    {
        return $this->hasMany(asn::class);
    }
    public function non_instansi()
    {
        return $this->hasMany(nonasn::class);
    }
}
