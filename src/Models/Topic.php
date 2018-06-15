<?php

namespace Src\Models;


use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{

    protected $table ='topics';

    protected $filliable = ['user_id','title', 'description'];

    //restringir las propiedades que son visibles cuando se transforma en array
    protected $visible = ['user_id','title', 'description'];

    public function users(){

        return $this->belongsTo('Src\Models\User', 'user_id');
    }



}