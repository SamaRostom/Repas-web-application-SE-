<?php
require_once 'UserModel.php';

class CateringModel extends UserModel
{
    public  $title = 'Catering Page';
    protected $Catering_ID,$NumberOfPeople,$NumberOfPeopleErr,$NumberOfChildern,$Meals,$MealsErr,$Extras,$Catering_Time,$Catering_TimeErr,$Order_Time_Catering,$Food_Allergy;

    public function __construct()
    {
        parent::__construct();
        $this->Catering_ID    = '';
        $this->NumberOfPeople = '';
        $this->NumberOfChildern = '';
        $this->Meals    = '';
        $this->Extras = '';
        $this->Catering_Time    = '';
        $this->Order_Time_Catering    = '';
        $this->Food_Allergy = '';
    }

    public function getCatering_ID()
    {
        return $this->Catering_ID;
    }
    public function setCatering_ID($Catering_ID)
    {
        $this->Catering_ID = $Catering_ID;
    }

    public function getNumberOfPeople()
    {
        return $this->NumberOfPeople;
    }
    public function setNumberOfPeople($NumberOfPeople)
    {
        $this->NumberOfPeople = $NumberOfPeople;
    }
    public function getNumberOfPeopleErr()
    {
        return $this->NumberOfPeopleErr;
    }
    public function setNumberOfPeopleErr($NumberOfPeopleErr)
    {
        $this->NumberOfPeopleErr = $NumberOfPeopleErr;
    }
    public function getNumberOfChildern()
    {
        return $this->NumberOfChildern;
    }
    public function setNumberOfChildern($NumberOfChildern)
    {
        $this->NumberOfChildern = $NumberOfChildern;
    }
    public function getMeals()
    {
        return $this->Meals;
    }
    public function setMeals($Meals)
    {
        $this->Meals = $Meals;
    }

    public function getMealsErr()
    {
        return $this->MealsErr;
    }
    public function setMealsErr($MealsErr)
    {
        $this->MealsErr = $MealsErr;
    }

    public function getExtras()
    {
        return $this->Extras;
    }
    public function setExtras($Extras)
    {
        $this->Extras = $Extras;
    }
    public function getCatering_Time()
    {
        return $this->Catering_Time;
    }
    public function setCatering_Time($Catering_Time)
    {
        $this->Catering_Time = $Catering_Time;
    }
    public function getCatering_TimeErr()
    {
        return $this->Catering_TimeErr;
    }
    public function setCatering_TimeErr($Catering_TimeErr)
    {
        $this->Catering_TimeErr = $Catering_TimeErr;
    }
    public function getOrder_Time_Catering()
    {
        return $this->Order_Time_Catering;
    }
    public function setOrder_Time_Catering($Order_Time_Catering)
    {
        $this->Order_Time_Catering = $Order_Time_Catering;
    }

    public function getFood_Allergy()
    {
        return $this->Food_Allergy;
    }
    public function setFood_Allergy($Food_Allergy)
    {
        $this->Food_Allergy = $Food_Allergy;
    }

    public function addcatering()
    {
        $this->dbh->query("INSERT INTO `catering`(`ID_Person`, `NumberOfPeople`, `NumberOfChildern`, `Meals`, `Extras`, `Catering_Time`, `Order_Time_Catering`, `Food_Allergy`) VALUES(:ID_Person, :NumberOfPeople, :NumberOfChildern, :Meals, :Extras, :Catering_Time, :Order_Time_Catering, :Food_Allergy)");
        $this->dbh->bind(':ID_Person', $_SESSION['ID_Person']);
        $this->dbh->bind(':NumberOfPeople', $this->NumberOfPeople);
        $this->dbh->bind(':NumberOfChildern', $this->NumberOfChildern);
        $this->dbh->bind(':Meals', $this->Meals);
        $this->dbh->bind(':Extras', $this->Extras);
        $this->dbh->bind(':Catering_Time', $this->Catering_Time);
        $this->dbh->bind(':Order_Time_Catering', $this->Order_Time_Catering);
        $this->dbh->bind(':Food_Allergy', $this->Food_Allergy);

        return $this->dbh->execute();
    }

    public function PrintAllCaterings()
    {
        $this->dbh->query('SELECT * FROM catering');
        $record = $this->dbh->resultSet();
        return $record;

        // $this->dbh->query('SELECT Username FROM person WHERE ID_Person = :ID_Person');
        // $this->dbh->bind(':ID_Person', $ID);
        // $record2 = $this->dbh->resultSet();
        // return $record;
    }
}