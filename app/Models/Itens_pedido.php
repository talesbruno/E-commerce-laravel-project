<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Itens_pedido extends Model
{
    use HasFactory;

    protected $guarded = [];

    
    public function produtos(){
        return $this->belongsTo(Produto::class, 'produto_id');
    }

    public function pedido(){
        return $this->belongsTo(Pedido::class, 'pedido_id');
    }


}
