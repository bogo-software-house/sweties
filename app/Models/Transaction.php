<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transaction';
    protected $primaryKey = 'id_transaction';
    public $incrementing = false; // Karena id_admin bukan auto-increment
    protected $keyType = 'string';
    protected $fillable = ['id_transaction', 'status'];

    // relasi ke admin
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'id_admin', 'id_admin');
    }
    // relasi ke pembeli
    public function pembeli()
    {
        return $this->belongsTo(Admin::class, 'id_pembeli', 'id_pembeli');
    }

    // relasi ke point
    public function point()
    {
        return $this->belongsTo(Point::class, 'id_barang', 'id_barang');
    }

    public function history()
    {
        return $this->hasMany(History::class, 'id_transaction', 'id_transaction');
    }
}
