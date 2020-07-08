<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LastNew extends Model
{
   protected $table = 'news';
    protected $fillable =[ 'new','img','title'];
}
