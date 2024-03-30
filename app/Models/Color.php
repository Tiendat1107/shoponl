<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $table = 'tbl_color';

    protected $fillable = ['id_product', 'color'
];

}
