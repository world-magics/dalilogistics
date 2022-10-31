<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\NadyojnostModel;

class NadyojnostModel extends Model
{
    use HasFactory,SoftDeletes;

    protected $table='nadyojnost';

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
