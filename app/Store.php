<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $table = 'prg_sample_storelist';

    public function host()
    {
        return $this->hasMany('App\SupervisorStore', 'store_id', 'id');
    }
}
