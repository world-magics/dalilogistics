<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "projects";

    protected $fillable = [
        'id',
        'title',
        'slug',
        'short_info',
        'content',
        'image',
        'status',
    ];

    protected $casts = [
        'slug' => 'array',
        'title' => 'array',
        'short_info' => 'array',
        'content' => 'array',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];

}
