<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;
    protected $table = 'recipes';

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

    public function qualifications (){
        return $this -> belongsToMany (User::class, 'qualifies', 'id_recipe','id_user') -> withPivot('id','commentary','qualification');
    }

    public function ingredients (){
        return $this -> belongsToMany (Ingredient::class,'has', 'id_recipe', 'id_ingredient')-> withPivot('lot');
    }

    public function hasIngredient($id){
        return Has::where('id_recipe', $this->id)->where('id_ingredient',$id);
    }

    public function categories(){
        return $this -> belongsToMany (Category::class,'belongs', 'id_recipe', 'id_category');
    }

    public function hasCategory($id){
        return Belongs::where('id_recipe', $this->id)->where('id_category',$id);
    }
}
