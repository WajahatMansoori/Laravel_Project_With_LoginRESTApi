<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $PrimaryKey='id';
    public $timestamps=false;
    protected $fillable=['Name','Email','Age'];
}
