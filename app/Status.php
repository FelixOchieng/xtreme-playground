<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'Status';
    protected $primaryKey = 'StatusCode';
    protected $guarded = [];
    public $timestamps = false;
}
