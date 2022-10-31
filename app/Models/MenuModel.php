<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MenuModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table='menus';

    protected $fillable=[
        'id',
        'title',
        'status',
    ];

    protected $casts = [
        'title' => 'array',
    ];

    protected $hidden=[
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
