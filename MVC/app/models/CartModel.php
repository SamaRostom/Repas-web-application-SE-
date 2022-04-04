<?php
require_once 'UserModel.php';
class CartModel extends UserModel
{
    public  $title = 'Cart Page';
    protected $Meal_ID;
    protected $Meal_Name;
    protected $Meal_Price;
    protected $Order_ID;
    

    public function __construct()
    {
        parent::__construct();
        $this->Meal_ID     = "";
        $this->Meal_Name = "";
        $this->Meal_Price = "";
        $this->Order_ID = "";
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

    public function getMeal_Price()
    {
        return $this->Meal_Price;
    }

    public function setMeal_Price($Meal_Price)
    {
        $this->Meal_Price = $Meal_Price;
    }

    public function getOrder_ID()
    {
        return $this->Order_ID;
    }

    public function setOrder_ID($Order_ID)
    {
        $this->Order_ID = $Order_ID;
    }

    public function addtocart()
    {
        // $this->dbh->query("INSERT INTO orders (`Username`, `Password`, `Address`, `Phone_Number`, `Backup_Number`) VALUES(':Username', ':Password', ':Address', ':Phone_Number', ':Backup_Number')");
        // $this->dbh->bind(':Username', $this->Username);
        // $this->dbh->bind(':Password', $this->Password);
        // $this->dbh->bind(':Address', $this->Address);

        // return $this->dbh->execute();
    }

    public function setAll(){
        $this->dbh->query("SELECT `Meal_ID`, `Quantity` FROM `order_details` WHERE Order_ID = :Order_ID ");
        $this->dbh->bind(':Order_ID', $this->Order_ID);
        //set model from the output of the query
    }
}