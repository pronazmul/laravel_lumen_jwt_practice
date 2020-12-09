<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class registration_model extends Model
{
    protected $table = 'registration';
    protected $primaryKey = 'id';
    protected $keyType = 'int';
    public $incrementing = true;
    public $timestamps = false;
}
