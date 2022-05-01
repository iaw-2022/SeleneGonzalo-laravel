<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qualifies extends Model
{
    use HasFactory;
    protected $table = 'qualifies';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'commentary',
        'qualification',
        'id_user',
        'id_recipe'
    ];
}
