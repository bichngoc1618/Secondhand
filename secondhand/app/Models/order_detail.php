<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_detail extends Model
{
    use HasFactory;
    protected $table = 'order_detail';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'order_id',
        'product_id',
        'price',
        'quantity',
        'product_name'
      
       
       
       
    ];
    public function order()
    {
        return $this->belongsTo(order::class, 'order_id');
    
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    
    }
}
