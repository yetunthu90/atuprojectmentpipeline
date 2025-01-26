<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CustomerRequest extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 
        'email', 
        'phone_number', 
        'course_id', 
        'start_date', 
        'nice_to_have', 
        'payment_method_id',
        'message',
    ];

}
