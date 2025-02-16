<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends Model
{
    protected $table = 'admins';
    protected $primaryKey = 'id_admin';
    public $incrementing = false; // Karena id_admin bukan auto-increment
    protected $keyType = 'string';

    protected $fillable = [
        'id_admin',
        'username',
        'password',
        'email',
        'wa',
        'nama_toko',
    ];

    protected $hidden = [
        'password',
    ];

    public function admin()
    {
        return $this->hasMany(admin::class, 'id_admin', 'id_admin');
    }
}
