<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $fillable = ['user_id', 'type', 'value', 'currency', 'description'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
