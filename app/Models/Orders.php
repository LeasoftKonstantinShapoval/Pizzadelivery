<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['product_ids', 'total_price', 'payment_type', 'user_name', 'address_delivery', 'phone_number', 'accepted', 'delivered', 'created_at', 'updated_at', 'user_id'];

}
