<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * Use table timestamps
     *
     * @var boolean
     */
    public $timestamps = false;

    protected $fillable = ['name', 'category', 'price'];
}
