<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\KachestvaModel;

class KachestvaModel extends Model
{
    use HasFactory,SoftDeletes;

    protected $table='kachestva';

    protected $fillable=[
        'id',
        'title',
        'content',
        'imgurl',
        'status',
    ];

    protected $casts = [
        'title' => 'array',
        'content' => 'array',
    ];

    protected $hidden=[
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
