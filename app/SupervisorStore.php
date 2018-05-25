<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SupervisorStore extends Model
{
    protected $table = 'supervisor_store';

    protected $fillable = ['supervisor_id','store_id'];

    public function store()
    {
        return $this->belongsTo('App\Store', 'store_id', 'id');
    }
}
