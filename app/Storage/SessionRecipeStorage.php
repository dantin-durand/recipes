<?php

namespace App\Storage;

use App\Models\Recipe;
use App\Storage\Contracts\RecipeStorageInterface;

class SessionRecipeStorage implements RecipeStorageInterface
{
    private $recipes;
    
    public function __construct()
    {
        $this->recipes = array();
    }

    public function store(Recipe $Recipe)
    {
        $this->recipes = array_push($this->recipes, $Recipe) ;
        return end($this->recipes)->id;
    }

    public function update(Recipe $Recipe)
    {
        foreach($this->recipes as $recipe){
            if($Recipe->id === $recipe->id){
                $this->recipes[$recipe] = $Recipe;
            }
        }
        return $this->recipes;
    }

    public function get($id)
    {
        foreach($this->recipes as $recipe){
            if($recipe->id === $id){
                return $recipe;
            }
        }
    }

    public function all()
    {
        return $this->recipes;
    }
}