<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    public $timestamps = false;
    protected $fillable = [
        'id',
        'categories_id',
        'price',
        'title',
        'thumbnail',
        'description',
        'sale',
        'status',
       
       
       
    ];
   
    use HasFactory;
    public function category()
    {
        return $this->belongsTo(category::class, 'categories_id');
    }
public function cart()
{
    return $this->hasMany(related:cart::class);
}
public function order_detail()
{
    return $this->hasMany(related:order_detail::class);
}
public function reviews()
{
    return $this->hasMany(related:reviews::class);
}
}
