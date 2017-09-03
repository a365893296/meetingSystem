<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dept extends Model
{
    protected $table = "dept";
    protected $primaryKey="id" ;
    public $timestamps = false ;
}
