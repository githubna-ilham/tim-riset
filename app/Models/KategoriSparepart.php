<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class KategoriSparepart extends Model
{
    use HasFactory, HasUuids;

    protected $primaryKey = 'kategori_id';
    public $incrementing = false;
    protected $table = 'kategori_sparepart';

    protected $fillable = [
        'kategori_id',
        'nama_kategori',
    ];

    public function sparepart()
    {
        return $this->hasMany(Sparepart::class, 'kategori_id', 'kategori_id');
    }
}
