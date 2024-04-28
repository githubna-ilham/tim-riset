<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Customer extends Authenticatable
{
    use HasFactory, HasUuids;

    protected $primaryKey = 'customer_id';
    public $incrementing = false;
    protected $table = 'customers';

    protected $fillable = [
        'customer_id',
        'username',
        'password',
        'nama_customer',
        'email',
        'no_telp',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function kendaraan()
    {
        return $this->hasMany(Kendaraan::class, 'customer_id', 'customer_id');
    }
}
