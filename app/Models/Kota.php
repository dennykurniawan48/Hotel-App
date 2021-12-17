<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    use HasFactory;
    protected $fillable = ["nama"];

    public function hotel(){
        return $this->hasMany(Hotel::class, 'ref_kota', 'id');
    }
}
