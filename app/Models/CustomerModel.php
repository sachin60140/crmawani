<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerModel extends Model
{
    public $table="clients";
    public $timestamps = false;
    use HasFactory;

    protected $fillable = [
        'mobile',
        'name',
        'address',
        'city',
        'state',
        'pincode',

    ];
}
