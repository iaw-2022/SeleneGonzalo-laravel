<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Models\Ingredient;
use App\Models\Has;
use App\Models\Belongs;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipes = Recipe::all();
        return view('recipes.index')-> with ('recipes', $recipes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $recipe = Recipe::all();
        $ingredients = Ingredient::all();
        $categories = Category::all();
        return view ('recipes.create')->with('recipe',$recipe)->with('ingredients',$ingredients)->with('categories',$categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $recipes = new Recipe();

        $request -> validate(['name' => 'required|max:255']);
        $request -> validate(['image' => 'required|max:2048']);
        $request -> validate(['description' => 'required|max:700']);

        $recipes-> name = $request-> get('name');

        $file = $request-> file('image');

        $image = $file->storeOnCloudinary('/recipes');
        $recipes->image = $image->getPath();
        $recipes->image_path = $image->getPublicId();

        $recipes-> description = $request-> get('description');
        $recipes->save();

        $lots = $request -> get('lot');
        $count = 0;
        $ingredients = $request -> input ('check_ingredients');
        $categories = $request -> input ('check_categories');
        
        if($categories == null)
            return redirect('/recipes/create')->withErrors("Debe seleccionar al menos una categoría");
        if($ingredients == null)
            return redirect('/recipes/create')->withErrors("Debe seleccionar al menos un ingrediente");

        foreach ((array) $ingredients as $ingredient){
            $has = new Has();
            $has -> lot = $lots[$count++];
            $has -> id_ingredient = $ingredient;
            $has -> id_recipe = $recipes->id;
            $has -> save();
        }
        foreach((array) $categories as $category){
            $belongs = new Belongs();
            $belongs -> id_category = $category;
            $belongs -> id_recipe = $recipes->id;
            $belongs -> save();
        }
        return redirect('/recipes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $recipe = Recipe::find($id);
        return view ('recipes.show') -> with ('recipe',$recipe);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $recipe = Recipe::find($id);
        $ingredients = Ingredient::all();
        $categories = Category::all();
        return view ('recipes.edit')->with('recipe',$recipe)->with('ingredients',$ingredients)->with('categories',$categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request -> validate(['name' => 'required|max:255']);
        $request -> validate(['image' => 'required|max:2048']);
        $request -> validate(['description' => 'required|max:700']);

        $recipe = Recipe::find($id);
        if ($recipe == null)
            return redirect('/recipes/{{$recipe->id}}/edit')->withErrors("No se encontró la receta solicitada");

        $recipe-> name = $request-> get('name');

        $file = $request-> file('image');
        
        if ($file != null){
            try{
                Cloudinary::destroy($recipe->image_path);
                $image = $file->storeOnCloudinary('/recipes');
            }catch(Exception $exc){
                return redirect ('/recipes/$id/edit')->withError("No se pudo cargar la imagen");
            }
        }
        
        $recipe->image = $image->getPath();
        $recipe->image_path = $image->getPublicId();

        $recipe-> description = $request-> get('description');

        $ingredients = $request -> input ('check_ingredients');
        $categories = $request -> input('check_categories');

        if($categories == null)
            return redirect('/recipes/{{$recipe->id}}/edit')->withErrors("Debe seleccionar al menos una categoría");
        if($ingredients == null)
            return redirect('/recipes/{{$recipe->id}}/edit')->withErrors("Debe seleccionar al menos un ingrediente");

        try{
            DB::beginTransaction();
            $recipe -> ingredients()->detach();
            $recipe -> categories()->detach();
            $lots = $request -> get('lot');
            $count = 0;
            foreach ((array) $ingredients as $ingredient){
                $has = new Has();
                $has -> lot = $lots[$count++];
                $has -> id_ingredient = $ingredient;
                $has -> id_recipe = $id;
                $has -> save();
            }
            foreach((array) $categories as $category){
                $belongs = new Belongs();
                $belongs -> id_category = $category;
                $belongs -> id_recipe = $id;
                $belongs -> save();
            }
            DB::commit();
            $recipe->save();

        }catch(\Exception $e){
            DB::rollback();
            throw $e;
        }
        return redirect('/recipes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $recipe = Recipe::find($id);
        if ($recipe == null){
            abort(404, "No se encontró la receta para eliminar");
        }

        if ($recipe != null){
            Cloudinary::destroy($recipe->image_path);
        }

        $recipe->delete();

        return redirect('/recipes');
    }
}
