<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang extends Model
{
    protected $table = "barang";
    protected $primarykey = "id";
    protected $fillable = ['id','no_palet', 'invoice','user_id', 'tglmasuk', 'tglpindah', 'lorong', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function barang2()
    {
        return $this->hasMany(barang2::class);
    }
}