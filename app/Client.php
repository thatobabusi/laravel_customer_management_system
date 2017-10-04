<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'created_user_id',
    ];

    protected $table = "clients";

    public function CreatedBy()
    {
        return $this->belongsTo('App\User', 'created_user_id');
    }
}
