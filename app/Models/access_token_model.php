<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class access_token_model extends Model
{
    protected $table = 'access_token';
    protected $primaryKey = 'id';
    protected $keyType = 'int';
    public $incrementing = true;
    public $timestamps = false;
}
