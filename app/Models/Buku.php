<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;
    
    protected $table = 'buku';
    
    protected $fillable = [
        'isbn',
        'judul',
        'deskripsi',
        'tahun',
        'penulis_id',
        'stok'
    ];
    
    public function penulis()
    {
        return $this->belongsTo(Penulis::class);
    }
}
