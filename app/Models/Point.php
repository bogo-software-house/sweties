<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    protected $table = 'point';
    protected $primaryKey = 'id_barang';
    public $incrementing = false; // Karena id_admin bukan auto-increment
    protected $keyType = 'string';

    
    protected $fillable = ['id_pembeli', 'nama_barang','point_barang'];

    public function transaction()
    {
        return $this->hasMany(Transaction::class, 'id_barang', 'id_barang');
    }
}
