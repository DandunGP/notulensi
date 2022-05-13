<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rapat extends Model
{
    use HasFactory;
    protected $guarded = ['id_rapat'];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
    public function asn()
    {
        return $this->belongsToMany(asn::class, 'id_asn', 'id_asn');
    }
    public function nonasn()
    {
        return $this->BelongsToMany(nonasn::class, 'id_non', 'id_non');
    }
    public function notulen()
    {
        return $this->hasMany(Notulen::class);
    }
}
