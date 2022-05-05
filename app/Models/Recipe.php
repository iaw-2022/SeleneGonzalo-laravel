<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;
    protected $table = 'recipes';
    #protected $primaryKey = 'email';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'image',
        'description'
    ];

    public function ingredients (){
        return $this -> belongsToMany (Ingredient::class,'has', 'id_recipe', 'id_ingredient')-> withPivot('lot');
    }

    public function qualifications (){
        return $this -> belongsToMany (User::class, 'qualifies', 'id_recipe','id_user') -> withPivot('commentary','qualification');
    }
}
