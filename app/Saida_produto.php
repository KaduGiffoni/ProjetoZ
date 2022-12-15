<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Saida_produto extends Model
{
    public function produtos(){
        return $this->belongsTo('App\Produtos');
    }
}
