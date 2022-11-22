<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $guarded = [];

    
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function itens_pedidos(){
        return $this->hasMany('App\Models\Itens_pedido');
    }

}
