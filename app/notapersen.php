<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class notapersen extends Model
{
    protected $table = 'notapersen';

    public function notapersen()
    {
        return $this->hasOne('App\notapersen','user_id');
    }

}
