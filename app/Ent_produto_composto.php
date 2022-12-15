<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ent_produto_composto extends Model
{
    public function produtos(){
        return $this->belongsTo('App\Produtos');
    }
}
