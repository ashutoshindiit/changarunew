<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Seller;
		

class SellerCategory extends Model
{
    use SoftDeletes;

    protected $table = 'seller_categories';
    
    protected $fillable = ['name','seller_id','image'];

    public $timestamps = false;

    public function seller()
    {
        return $this->hasOne('App\Models\Seller', 'id', 'seller_id');
    }

}


























