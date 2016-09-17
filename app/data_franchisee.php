<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class data_franchisee extends Model
{
    protected $table = 'data_franchisee';
    protected $fillable =  ['nama', 'alamat', 'npwp', 'tanggal_mulai','status_aktif', 'created_at', 'updated_at'];

    public function data_franchisee()
    {
        return $this->hasOne('App\data_franchisee','user_id');
    }

}
