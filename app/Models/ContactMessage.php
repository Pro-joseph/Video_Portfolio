<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'category_id',
        'subject',
        'body',
        'is_read',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
