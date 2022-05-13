<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jabatan extends Model
{
    protected $guarded = ['id_jabatan'];

    public function jabatan()
    {
        return $this->hasMany(asn::class);
    }
}
