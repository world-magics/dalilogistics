<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BannerModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "banners";

    protected $fillable=[
        'id',
        'title',
        'info',
        'image',
        'status',
    ];

    protected $casts = [
        'title' => 'array',
        'info' => 'array',
    ];

    protected $hidden=[
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
