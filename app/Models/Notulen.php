<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notulen extends Model
{
    use HasFactory;

    protected $guarded = ['id_notulensi'];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
    public function rapat()
    {
        return $this->belongsTo(Rapat::class);
    }
}
