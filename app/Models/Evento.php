<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table = 'evento';
    
    protected $fillable =[
           'empresa_id',
           'titulo',
            'site',
            'descrição',   
            'data_inicio',
            'data_fim',
            'localização',         
            'capacidade', 
            'imagem_capa',
            'categoria',
            'status'  
    ];
}
