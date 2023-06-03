<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = 
        [
            'id', 'name', 'level', 'email','password'];


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
class users extends Model
{
    protected $table = "users";
    protected $primarykey = "id";
    protected $fillable = [
        'id', 'name', 'level', 'email','password'];

    public function barang()
    {
        return $this->hasMany(Barang::class);
    }
    public function barang2()
    {
        return $this->hasMany(barang2::class);
    }
}