<?php
require_once 'UserModel.php';
class CheckoutModel extends UserModel
{
    public  $title = 'Checkout Page';
    protected $Order_ID;
    protected $Order_Time;
    protected $Total_Price;
    protected $Meal_ID;
    protected $Quantity;

    public function __construct()
    {
        parent::__construct();
        $this->Order_ID     = "";
        $this->Order_Time = "";
        $this->Total_Price = "";
        $this->Meal_ID = "";
        $this->Quantity = "";
    }

    public function getOrder_ID()
    {
        return $this->Order_ID;
    }

    public function setOrder_ID($Order_ID)
    {
        $this->Order_ID = $Order_ID;
    }

    public function getOrder_Time()
    {
        return $this->Order_Time;
    }

    public function setOrder_Time($Order_Time)
    {
        $this->Order_Time = $Order_Time;
    }

    public function getTotal_Price()
    {
        return $this->Total_Price;
    }

    public function setTotal_Price($Total_Price)
    {
        $this->Total_Price = $Total_Price;
    }

    public function getMeal_ID()
    {
        return $this->Meal_ID;
    }

    public function setMeal_ID($Meal_ID)
    {
        $this->Meal_ID = $Meal_ID;
    }
    public function getQuantity()
    {
        return $this->Quantity;
    }

    public function setQuantity($Quantity)
    {
        $this->Quantity = $Quantity;
    }

    public function Checkout()
    {
        $this->dbh->query('SELECT * from person WHERE ID_Person=:ID_Person');
        $this->dbh->bind(':ID_Person', $this->ID_Person);
         
        $record = $this->dbh->resultSet();

        return $record;
    }
}
