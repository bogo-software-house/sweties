<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pembeli extends Model
{
    protected $table = 'pembeli';
    protected $primaryKey = 'id_pembeli';
    public $incrementing = false; // Karena id_admin bukan auto-increment
    protected $keyType = 'string';

    protected $fillable = [
        'id_pembeli',
        'username',
        'password',
        'email',
        'wa',
        'alamat',
    ];

    public function transaction()
    {
        return $this->hasMany(Transaction::class, 'id_pembeli', 'id_pembeli');
    }
}
