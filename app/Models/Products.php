<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Products extends Model
{
    use HasFactory;
    use Sortable;

    protected $table = 'products';

    public $sortable = [
        'name', 'stock', 'price'
    ];
}
