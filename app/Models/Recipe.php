<?php 

namespace App\Models;

class Recipe
{
    protected $id;
    protected $created_at;
    protected $name;
    protected $description;
    protected $persons;
    protected $preparation_time;

    /**
     * Get the value of created_at
     */ 
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set the value of created_at
     *
     * @return  self
     */ 
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of persons
     */ 
    public function getPersons()
    {
        return $this->persons;
    }

    /**
     * Set the value of persons
     *
     * @return  self
     */ 
    public function setPersons($persons)
    {
        $this->persons = $persons;

        return $this;
    }

    /**
     * Get the value of preparation_time
     */ 
    public function getPreparationTime()
    {
        return $this->preparation_time;
    }

    /**
     * Set the value of preparation_time
     *
     * @return  self
     */ 
    public function setPreparationTime($preparation_time)
    {
        $this->preparation_time = $preparation_time;

        return $this;
    }
}