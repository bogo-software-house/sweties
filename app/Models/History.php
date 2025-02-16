<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    protected $table = 'history';
    protected $primaryKey = 'id_history';
    public $incrementing = false; // Karena id_admin bukan auto-increment
    protected $keyType = 'string';
    protected $fillable = ['id_history'];


    // relasi ke transaction
    public function admin()
    {
        return $this->belongsTo(Transaction::class, 'id_transaction', 'id_transaction');
    }
}
