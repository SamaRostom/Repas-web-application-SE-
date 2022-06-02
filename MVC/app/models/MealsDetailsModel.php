<?php
require_once 'UserModel.php';
class MealsDetailsModel extends UserModel
{
    public  $title = 'MealsDetails Page';

    protected $Meal_ID,$Meal_Name,$Meal_Price,$Quantity;

    public function __construct()
    {
        parent::__construct();
        $this->Meal_ID    = '';
        $this->Meal_Name = '';
        $this->Quantity    = 0;
        $this->Meal_Price    = '';
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
    public function getQuantity()
    {
        return $this->Quantity;
        return $Quantity+=1;
    }
    public function Quantity()
    {
        $this->Quantity+=1;
    }
    public function setQuantity($Quantity)
    {
        $this->Quantity = $Quantity;
    }
    public function getMeal_Price()
    {
        return $this->Meal_Price;
    }
    public function setMeal_Price($Meal_Price)
    {
        $this->Meal_Price = $Meal_Price;
    }

    public function MealsDetails()
    {
        $this->dbh->query('SELECT * from meals WHERE Meal_ID=:Meal_ID');
        $this->dbh->bind(':Meal_ID', $this->Meal_ID);
         
        $record = $this->dbh->resultSet();
        foreach($record as $x){
            // $this->Meal_ID=$x->Meal_ID;
            // $this->Meal_Name=$x->Meal_Name;
            // $this->Meal_Price=$x->Meal_Price;
            $_SESSION["Meal_ID"]=$x->Meal_ID; 
            $_SESSION["Meal_Name"]=$x->Meal_Name;
            $_SESSION["Meal_Price"]=$x->Meal_Price;  
        }
        $_SESSION["Quantity"]=$this->Quantity;
        return $record;

    }
}
