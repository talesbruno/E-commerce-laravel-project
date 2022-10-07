<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
    public function user1(){
        return $this->belongsTo(User::class, 'id_user');
    }

    public function users(){
        return $this->belongsToMany('App\Models\User')->withPivot(['comentario','estrela','nome']);
    }
}
