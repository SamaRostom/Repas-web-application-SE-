<?php
require_once 'UserModel.php';
class MealsModel extends UserModel
{
    public  $title = 'Meals Page';
    protected $ID_Category,$Meal_ID,$Meal_Name,$Meal_Image,$Meal_Price;

    public function __construct()
    {
        parent::__construct();
        $this->ID_Category    = '';
        $this->Meal_ID    = '';
        $this->Meal_Name = '';
        $this->Meal_Image    = '';
        $this->Meal_Price    = '';
    }

    public function getID_Category()
    {
        return $this->ID_Category;
    }
    public function setID_Category($ID_Category)
    {
        $this->ID_Category = $ID_Category;
    }

    public function getMeal_ID()
    {
        return $this->Meal_ID;
    }
    public function setMeal_ID($Meal_ID)
    {
        $this->Meal_ID = $Meal_ID;
    }

    public function getMeal_Name()
    {
        return $this->Meal_Name;
    }
    public function setMeal_Name($Meal_Name)
    {
        $this->Meal_Name = $Meal_Name;
    }

    public function getMeal_Image()
    {
        return $this->Meal_Image;
    }
    public function setMeal_Image($Meal_Image)
    {
        $this->Meal_Image = $Meal_Image;
    }

    public function getMeal_Price()
    {
        return $this->Meal_Price;
    }
    public function setMeal_Price($Meal_Price)
    {
        $this->Meal_Price = $Meal_Price;
    }

    public function Meals()
    {
        $this->dbh->query('SELECT * from meals WHERE ID_Category=:ID_Category');
        $this->dbh->bind(':ID_Category',$this->ID_Category)
        // $record = $this->dbh->resultSet();
        // return $record;
        
        return $this->dbh->resultSet();
    }
}