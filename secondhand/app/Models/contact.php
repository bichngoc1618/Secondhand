<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class contact extends Model
{
    use HasFactory;
    protected $table = 'contact';
    public $timestamps = true;
    protected $fillable = [
        'id',
        'name',
        'email',
        'feedback',
        'subject',
        'created_at',
    ];
}
