<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cooperation extends Model
{
    use HasFactory;
    protected $table = 'cooperation';
    protected $fillable = [
       
        'id',
        'name',
        'logo',
        'visible',
      
       
    ];

}
