<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
//use Spatie\Translatable\HasTranslations;

class SettingModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'setting';

    protected $fillable = [
        'id',
        'key',
        'value',
    ];

    public $casts = [
        'value' => 'array',
    ];

}
