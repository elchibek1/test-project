<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    use HasFactory;

    protected $fillable = ['date', 'kind', 'category_id', 'total', 'comment'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
