<?php
require_once 'UserModel.php';

class EditMealModel extends UserModel{
    public  $title = 'Edit Meal Page';
    protected $Meal_ID,$Meal_Name,$Description,$Meal_Price,$Amount,$ID_Category,$Meal_Image;

    public function __construct()
    {
        parent::__construct();
        $this->Meal_ID    = '';
        $this->Meal_Name = '';
        $this->Description    = '';
        $this->Meal_Price = '';
        $this->Amount = '';
        $this->ID_Category = '';
        $this->Meal_Image = '';
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

}