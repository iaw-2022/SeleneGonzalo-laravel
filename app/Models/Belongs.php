<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Belongs extends Model
{
    use HasFactory;
    protected $table = 'belongs';
    protected $primaryKey = 'id_recipe';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_category',
        'id_recipe'
    ];
}
