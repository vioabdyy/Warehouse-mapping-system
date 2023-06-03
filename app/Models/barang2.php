<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class barang2 extends Model
{
    protected $table = "barang2";
    protected $primarykey = "id";
    protected $fillable = ['id','no_palet', 'invoice','user_id', 'tglmasuk', 'tglpindah', 'lorong', 'status'];
    
        public function user()
        {
            return $this->belongsTo(User::class);
        }

        public function barang()
        {
            return $this->belongsTo(barang::class);
            
        }
        
}

