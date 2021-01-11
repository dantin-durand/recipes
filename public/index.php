<?php

require __DIR__ . "/../vendor/autoload.php";

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . "/../");
$dotenv->load();


use App\Models\Recipe;
use App\Storage\SessionRecipeStorage;
use App\Storage\MySqlDatabaseRecipeStorage;
use App\RecipeManager;

try {
    $pdo = new PDO("{$_ENV['DB_CONNECTION']}:host={$_ENV['DB_HOST']};dbname={$_ENV['DB_NAME']}", $_ENV['DB_USER'], $_ENV['DB_PASSWORD']);
} catch (PDOException $e) {
    die($e->getMessage());
}

$storage = new MySqlDatabaseRecipeStorage($pdo); 
//$storage = new SessionRecipeStorage();
$manager = new RecipeManager($storage);

$recipe = new Recipe();

// Create a recipe
$recipe->setCreatedAt(new DateTime())
 ->setName('Fondant au chocolat mi-cuit')
 ->setDescription('La recette du fameux fondant au chocolat micuit.')
 ->setPersons(4)
 ->setPreparationTime(40);
$addedRecipe = $manager->addRecipe($recipe);
// Update (and get)
$recipe = $manager->getRecipe(5);
$recipe->setPreparationTime(60);
$manager->updateRecipe($recipe);
// Recipes
$recipes = $manager->getRecipes();
print_r($recipes);