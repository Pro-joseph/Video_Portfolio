<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Media extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_id',
        'type',
        'file_path',
        'video_url',
        'order',
    ];

    /**
     * Relationship with Project.
     */
    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    /**
     * type_label accessor.
     */
    protected function typeLabel(): Attribute
    {
        return Attribute::make(
            get: fn () => ucfirst($this->type),
        );
    }
}
