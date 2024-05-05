<?php

namespace App\Models;

use App\Traits\HasFormatRupiah;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Sparepart extends Model
{
    use HasFactory, HasUuids;
    use HasFormatRupiah;

    protected $primaryKey = 'sparepart_id';
    public $incrementing = false;
    protected $table = 'sparepart';

    protected $fillable = [
        'sparepart_id',
        'kategori_id',
        'nama_sparepart',
        'merk',
        'stok',
        'harga',
        'image',
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriSparepart::class, 'kategori_id', 'kategori_id');
    }
}
