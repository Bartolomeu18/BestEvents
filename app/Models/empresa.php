<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\Evento;
class empresa extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'nome',
        'email',
        'password',
        'nif',
        'telefone',
        'logo',
    ];

    protected $hidden = [
        'password',
    ];

    public function eventos(){

    return $this->hasMany(Evento::class);

    }
}
