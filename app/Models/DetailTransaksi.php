<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class DetailTransaksi extends Model
{
    use HasFactory, HasUuids;

    protected $primaryKey = 'detail_transaksi_id';
    public $incrementing = false;
    protected $table = 'detail_transaksi';

    protected $fillable = [
        'detail_transaksi_id',
        'transaksi_id',
        'sparepart_id',
        'quantity',
        'subtotal',
    ];

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'transaksi_id', 'transaksi_id');
    }

    public function sparepart()
    {
        return $this->belongsTo(Sparepart::class, 'sparepart_id', 'sparepart_id');
    }
}
