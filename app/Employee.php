<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //protected $fillable = ['firs_name','last_name','gender','email','phone','image'];
    protected $guarded = ['id'];
}
