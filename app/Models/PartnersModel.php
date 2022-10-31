<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PartnersModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "partners";

    protected $fillable=[
        'id',
        'link',
        'image',
        'status',
    ];

    protected $hidden=[
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
