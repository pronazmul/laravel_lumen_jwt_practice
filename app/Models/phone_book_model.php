<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class phone_book_model extends Model
{
    protected $table = 'phone_book';
    protected $primaryKey = 'id';
    protected $keyType = 'int';
    public $incrementing = true;
    public $timestamps = false;
}
