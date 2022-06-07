<?php
require_once 'UserModel.php';

class EditMealModel extends UserModel{
    public  $title = 'Edit Meal Page';
    protected $Meal_ID,$Meal_Name,$Description,$Meal_Price,$Amount,$ID_Category,$Meal_Image,$Meal_NameErr;

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
        $this->Meal_NameErr = '';
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

    public function getDescription()
    {
        return $this->Description;
    }
    public function setDescription($Description)
    {
        $this->Description = $Description;
    }

    public function getMeal_Price()
    {
        return $this->Meal_Price;
    }
    public function setMeal_Price($Meal_Price)
    {
        $this->Meal_Price = $Meal_Price;
    }

    public function getAmount()
    {
        return $this->Amount;
    }
    public function setAmount($Amount)
    {
        $this->Amount = $Amount;
    }

    public function getID_Category()
    {
        return $this->ID_Category;
    }
    public function setID_Category($ID_Category)
    {
        $this->ID_Category = $ID_Category;
    }

    public function getMeal_Image()
    {
        return $this->Meal_Image;
    }
    public function setMeal_Image($Meal_Image)
    {
        $this->Meal_Image = $Meal_Image;
    }

    public function getMeal_NameErr()
    {
        return $this->Meal_NameErr;
    }
    public function setMeal_NameErr($Meal_NameErr)
    {
        $this->Meal_NameErr = $Meal_NameErr;
    }

    public function setallMeals(){
        $this->dbh->query("SELECT * FROM meals WHERE Meal_ID=:Meal_ID");
        $this->dbh->bind(':Meal_ID', $this->Meal_ID);
       

        return $this->dbh->resultSet();
    }

    public function editMeal(){
        $this->dbh->query("UPDATE meals SET Meal_Name=:Meal_Name,Description=:Description,Meal_Price=:Meal_Price,Amount=:Amount,Meal_Image=:Meal_Image WHERE Meal_ID=:Meal_ID ");
        $this->dbh->bind(':Meal_ID', $this->Meal_ID);
        $this->dbh->bind(':Meal_Name', $this->Meal_Name);
        $this->dbh->bind(':Description', $this->Description);
        $this->dbh->bind(':Meal_Price', $this->Meal_Price);
        $this->dbh->bind(':Amount', $this->Amount);
        $this->dbh->bind(':Meal_Image', $this->Meal_Image);
        
        return $this->dbh->execute();
    }

}