<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
    protected $table = 'tbl_product_attribute';
    protected $primaryKey = 'id_attr';
    public $incrementing = true;


    protected $fillable = [
        'id_product', 'color', 'size',
    ];
}
