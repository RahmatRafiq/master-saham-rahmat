<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sortir extends Model
{
    use HasFactory;

    protected $table = 'table_sortir';

    protected $fillable = [
        'symbol',
        'y_open',
        'y_high',
        'y_low',
        'y_close',
        'date',
    ];
}
