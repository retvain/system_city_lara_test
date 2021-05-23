<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StoreProduct extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable
        = [
            'title',
            'excerpt',
            'content_raw',
            'breed'
        ];
}
