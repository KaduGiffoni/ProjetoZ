<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Ent_produto extends Model
{

    protected $guarded = [];

    public function produtos(){
        return $this->belongsTo('App\Produtos');
    }
}
