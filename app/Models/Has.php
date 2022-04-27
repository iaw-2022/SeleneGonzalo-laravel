<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Has extends Model
{
    use HasFactory;
    protected $table = 'has';
    protected $primaryKey = 'id_ingredient';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'lot',
        'id_ingredient',
        'id_recipe'
    ];
}
