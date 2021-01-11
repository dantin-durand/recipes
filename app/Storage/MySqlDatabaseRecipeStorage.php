<?php

namespace App\Storage;

use App\Models\Recipe;
use App\Storage\Contracts\RecipeStorageInterface;

class MySqlDatabaseRecipeStorage implements RecipeStorageInterface
{
    protected $db;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    public function store(Recipe $Recipe)
    {

        $statement = $this->db->prepare("INSERT INTO recipes (name, description, persons, preparation_time) VALUES (:name, :description, :persons, :preparation_time)");
        $statement->execute([
            'name' => $Recipe->getName(),
            'description' => $Recipe->getDescription(),
            'persons' => $Recipe->getPersons(),
            'preparation_time' => $Recipe->getPreparationTime(),
        ]);
        return $this->db->lastInsertId();
    }

    public function update(Recipe $Recipe)
    {
        $statement = $this->db->prepare("UPDATE recipes SET name = :name, description = :description, persons = :persons, preparation_time = :preparation_time WHERE id = :id");
        $values = [
            'id' => $Recipe->getId(),
            'name' => $Recipe->getName(),
            'description' => $Recipe->getDescription(),
            'persons' => $Recipe->getPersons(),
            'preparation_time' => $Recipe->getPreparationTime(),
        ];
        $statement->execute($values);
        return $this->get($Recipe->getId());
    }

    public function get($id)
    {
        $statement = $this->db->prepare('SELECT * FROM recipes WHERE id = :id');
        $statement->execute(['id' => $id]);
        $statement->setFetchMode(\PDO::FETCH_CLASS, Recipe::class);
        return $statement->fetch();
    }

    public function all()
    {
        $statement = $this->db->prepare('SELECT * FROM recipes');
        $statement->execute();
        return $statement->fetchAll(\PDO::FETCH_CLASS, Recipe::class);
    }
}