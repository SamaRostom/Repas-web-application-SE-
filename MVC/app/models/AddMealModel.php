<?php
require_once 'UserModel.php';

class AddMealModel extends UserModel
{
    public  $title = 'Add Meal Page';
    // protected $ID_Category;
    protected $Meal_Name;
    protected $Description;
    protected $Meal_Price;
    protected $Meal_Image;
    protected $Meal_NameErr;
    protected $DescriptionErr;
    protected $Meal_PriceErr;

    public function __construct()
    {
        parent::__construct();
        // $this->ID_Category    = '';
        $this->Meal_Name = '';
        $this->Description = '';
        $this->Meal_Price = '';
        $this->Meal_Image    = '';
        $this->Meal_NameErr = '';
        $this->DescriptionErr = '';
        $this->Meal_PriceErr = '';
    }

    // public function getID_Category()
    // {
    //     return $this->ID_Category;
    // }
    // public function setID_Category($ID_Category)
    // {
    //     $this->ID_Category = $ID_Category;
    // }


    public function getMeal_Name()
    {
        return $this->Meal_Name;
    }
    public function setMeal_Name($Meal_Name)
    {
        $this->Meal_Name = $Meal_Name;
    }
    public function getMeal_NameErr()
    {
        return $this->Meal_NameErr;
    }
    public function setMeal_NameErr($Meal_NameErr)
    {
        $this->Meal_NameErr = $Meal_NameErr;
    }


    public function getDescription()
    {
        return $this->Description;
    }
    public function setDescription($Description)
    {
        $this->Description = $Description;
    }
    public function getDescriptionErr()
    {
        return $this->DescriptionErr;
    }
    public function setDescriptionErr($DescriptionErr)
    {
        $this->DescriptionErr = $DescriptionErr;
    }

    public function getMeal_Price()
    {
        return $this->Meal_Price;
    }
    public function setMeal_Price($Meal_Price)
    {
        $this->Meal_Price = $Meal_Price;
    }
    public function getMeal_PriceErr()
    {
        return $this->Meal_PriceErr;
    }
    public function setMeal_PriceErr($Meal_PriceErr)
    {
        $this->Meal_PriceErr = $Meal_PriceErr;
    }


    public function getMeal_Image()
    {
        return $this->Meal_Image;
    }
    public function setMeal_Image($Meal_Image)
    {
        $this->Meal_Image = $Meal_Image;
    }

    public function addmeal(){
        $this->dbh->query("INSERT INTO `meals`(`Meal_Name`, `Description`, `Meal_Price`,`Meal_Image`) VALUES(:Meal_Name, :Description, :Meal_Price, :Meal_Image)");
        $this->dbh->bind(':Meal_Name', $this->Meal_Name);
        $this->dbh->bind(':Description', $this->Description);
        $this->dbh->bind(':Meal_Price', $this->Meal_Price);
        // $this->dbh->bind(':ID_Category', $this->ID_Category);
        $this->dbh->bind(':Meal_Image', $this->Meal_Image);

        return $this->dbh->execute();
    }
}