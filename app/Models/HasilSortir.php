<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilSortir extends Model
{
    use HasFactory;
    protected $table = 'table_hasil_sortir';

    protected $fillable = [
        'symbol',
        'open',
        'high',
        'low',
        'close',
    ];
}
