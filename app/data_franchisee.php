<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class data_franchisee extends Model
{
    protected $table = 'data_franchisee';

    public function data_franchisee()
    {
        return $this->hasOne('App\data_franchisee','user_id');
    }

}
