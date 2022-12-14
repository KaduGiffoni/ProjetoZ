<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $guarded = [];

    public function produtos(){
        return $this->hasMany('App\Produto');
    }
}
