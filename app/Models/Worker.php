<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    protected $PrimaryKey='id';
    protected $fillable=['Name','Email','Image'];
}
