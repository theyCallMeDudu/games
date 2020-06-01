<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelGame extends Model
{
    protected $table = 'games';
    protected $fillable = ['title', 'genre', 'id_user', 'price'];

    public function relUsers(){
        return $this->hasOne('App\User', 'id', 'id_user');
    }

}
