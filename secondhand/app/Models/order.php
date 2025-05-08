<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    protected $table = 'order';
    public $timestamps = true;
    protected $fillable = [
        'id',
        'user_id',
        'username',
        'email',
        'phone',
        'city',
        'address',
        'first_name',
        'last_name',
        'total_money',
        'status'
       
       
       
    ];
    public static function getStatusOptions()
    {
        return [
            'Wait'   => 'Wait',
            'Cancel' => 'Cancel',
            'Delivering'    => 'Delivering',
            'Done'  => 'Done',
            
        ];
    }
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    
    }
    public function order_detail()
{
    return $this->hasMany(order_detail::class, 'order_id', 'id');
}
   
}
