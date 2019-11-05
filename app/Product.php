<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * mass assignable fields
     *
     * @var array
     */
    protected $fillable = ['name', 'price', 'image', 'description'];
}
