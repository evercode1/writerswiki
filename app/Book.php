<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{

    protected $fillable = ['name',
                           'author',
                           'url',
                           'category_id',
                           'subcategory_id',
                           'user_id',
                           'slug',
                           'is_active',
                           'description'];



}