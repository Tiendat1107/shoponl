<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $primaryKey = 'product_id';
    public $incrementing = true;
    protected $table = 'tbl_products';
    protected $fillable = [
        'product_name', 'product_image', 'product_content',  'product_price', 'product_status', 'category_id',
    ];
}
