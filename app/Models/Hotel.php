<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;
    protected $fillable = ["name", "alamat", "harga", "latitude", "longitude", "biaya", "ref_kota", "foto", "fasilitas"];

    public function booking(){
        return $this->hasMany(Booking::class, 'ref_hotel', 'id');
    }

    public function kota(){
        return $this->belongsTo(Kota::class, 'ref_kota', 'id');
    }
}
