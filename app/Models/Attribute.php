<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    protected $table = 'tbl_attribute';

    protected $fillable = [
        'id_product',
        'id_attr',
        'quantity',
    ];
}
