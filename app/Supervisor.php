<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supervisor extends Model
{
    protected $table = 'prg_sample_supervisor';

    public function ownerkey()
    {
        return $this->hasOne('App\SupervisorKey');
    }

    public function store()
    {
        return $this->hasOne('App\SupervisorStore');
    }
}
