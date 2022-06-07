<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $primaryKey = 'Id';
    public $timestamps = false;
    protected $fillable = ['name', 'description', 'category_id', 'price', 'weight', 'photo', 'created_at', 'updated_at'];

}
