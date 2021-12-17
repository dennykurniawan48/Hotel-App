<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = ["ref_user", "ref_hotel", "start", "end", "durasi", "total"];

    public function user(){
        return $this->belongsTo(User::class, 'ref_user', 'id');
    }

    public function hotel(){
        return $this->belongsTo(Hotel::class, 'ref_hotel', 'id');
    }
}
