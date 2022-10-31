<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AboutModel extends Model
{
    use HasFactory,SoftDeletes;

    protected $table='abouts';

    protected $fillable=[
        'id',
        'title',
        'info',
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
