<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{

    protected $fillable = ['name',
                           'slug',
                           'is_active',
                           'description',
                           'image_name',
                           'image_extension'];



}