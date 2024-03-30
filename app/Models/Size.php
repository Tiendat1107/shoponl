<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    protected $table = 'tbl_size';
    protected $primaryKey = 'id_size';

    protected $fillable = [
        'id_product',  'size', 
    ];
}
