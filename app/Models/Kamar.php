<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kamar extends Model
{
    use HasFactory;

    protected $table = 'kamar';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = [
        'no_kamar',
        'harga',
        'keterangan',
        'fasilitas',
        'kost_id' // Assuming 'kost_id' is the foreign key column
    ];

    // Define the reverse relationship to LokasiKos
    public function lokasiKos()
    {
        return $this->belongsTo(LokasiKos::class, 'kost_id'); // Assuming 'kost_id' is the foreign key column
    }
}










