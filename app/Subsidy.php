<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subsidy extends Model
{
    protected $table = 'subsidy';
    protected $fillable = ['name','description','agency'];
}
