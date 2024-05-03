<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Transaksi extends Model
{
    use HasFactory, HasUuids;

    protected $primaryKey = 'transaksi_id';
    public $incrementing = false;
    protected $table = 'transaksi';

    protected $fillable = [
        'transaksi_id',
        'customer_id',
        'kendaraan_id',
        'keterangan_transaksi',
        'tanggal_transaksi',
        'total_harga',
        'admin_id',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'customer_id');
    }

    public function kendaraan()
    {
        return $this->belongsTo(Kendaraan::class, 'kendaraan_id', 'kendaraan_id');
    }

    // Definisikan relasi dengan model Admin
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'admin_id', 'admin_id');
    }
}