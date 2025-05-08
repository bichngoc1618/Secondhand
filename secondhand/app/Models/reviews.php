<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reviews extends Model
{
    protected $table = 'reviews';
    public $timestamps = true;
    protected $fillable = [
        'id',
        'product_id',
        'user_id',
        'user_name',
        'comment',
        'display',
       
       
       
       
    ];
    public static function getDisplayOptions()
    {
        return [
            '1'   => 'Displayed on the home page',
            '0'  => 'Not displayed',
            
        ];
    }
    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function Product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    
    }
   
}
