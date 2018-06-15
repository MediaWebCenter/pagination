<?php

namespace Src\Models;


use Illuminate\Database\Eloquent\Model;

class User extends Model
{

    protected $table ='users';

    protected $filliable = ['username','mail'];

    protected $hidden = [
        'password'
    ];

public function topics(){

    return $this->hasMany('Src\Models\Topic');
}

}