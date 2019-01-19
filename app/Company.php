<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'company';

    protected $fillable = ['name', 'master_id', 'description'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
