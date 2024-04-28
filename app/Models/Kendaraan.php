<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Kendaraan extends Model
{
    use HasFactory, HasUuids;

    protected $primaryKey = 'kendaraan_id';
    public $incrementing = false;
    protected $table = 'kendaraan';

    protected $fillable = [
        'kendaraan_id',
        'customer_id',
        'jenis_kendaraan',
        'nomor_polisi',
        'merk',
        'tahun',
        'image',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'customer_id');
    }
}
