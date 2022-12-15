<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $guarded = [];

    public function usuario(){
        return $this->belongsTo('App\Usuario');
    }

    public function ent_produtos(){
        return $this->hasMany('App\Ent_produto');
    }

    public function saida_produtos(){
        return $this->hasMany('App\Saida_produto');
    }

    public function ent_produtos_compostos(){
        return $this->hasMany('App\Ent_produto_composto');
    }
}

