<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;


class CommissionSetting extends Model
{
    use HasFactory;
    
    protected $table = 'commision_settings';
    protected $fillable = ['commision_type','commission_amount','commission_percentage'];
}



