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
    protected $Username;
    protected $UsernameErr;
    protected $Address;
    protected $AddressErr;
    protected $Phone_Number;
    protected $Phone_NumberErr;
    protected $Backup_Number;
    protected $Backup_NumberErr;
    public $ID_Person;

    public function __construct()
    {
        parent::__construct();
        $this->Order_ID     = "";
        $this->Order_Time = "";
        $this->Total_Price = "";
        $this->Meal_ID = "";
        $this->Quantity = "";
        $this->Username     = "";
        $this->UsernameErr = "";
        $this->ID_Person = "";

        $this->Address = "";
        $this->AddressErr = "";

        $this->Phone_Number = "";
        $this->Phone_NumberErr = "";

        $this->Backup_Number = "";
        $this->Backup_NumberErr = "";
    }
    public function getUsername()
    {
        return $this->Username;
    }

    public function setUsername($Username)
    {
        $this->Username = $Username;
    }

    public function getID_Person()
    {
        return $this->ID_Person;
    }

    public function setID_Person($ID_Person)
    {
        $this->ID_Person = $ID_Person;
    }
    public function getUsernameErr()
    {
        return $this->UsernameErr;
    }

    public function setUsernameErr($UsernameErr)
    {
        $this->UsernameErr = $UsernameErr;
    }
    public function getAddress()
    {
        return $this->Address;
    }

    public function setAddress($Address)
    {
        $this->Address = $Address;
    }

    public function getAddressErr()
    {
        return $this->AddressErr;
    }

    public function setAddressErr($AddressErr)
    {
        $this->Address = $AddressErr;
    }

    public function getPhone_Number()
    {
        return $this->Phone_Number;
    }

    public function setPhone_Number($Phone_Number)
    {
        $this->Phone_Number = $Phone_Number;
    }

    public function getPhone_NumberErr()
    {
        return $this->Phone_NumberErr;
    }

    public function setPhone_NumberErr($Phone_NumberErr)
    {
        $this->Phone_NumberErr = $Phone_NumberErr;
    }

    public function getBackup_Number()
    {
        return $this->Backup_Number;
    }

    public function setBackup_Number($Backup_Number)
    {
        $this->Backup_Number = $Backup_Number;
    }

    public function getBackup_NumberErr()
    {
        return $this->Backup_NumberErr;
    }

    public function setBackup_NumberErr($Backup_NumberErr)
    {
        $this->Backup_NumberErr = $Backup_NumberErr;
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
    public function idp(){
        $this->dbh->query('SELECT * from person WHERE Username = :Username AND Password = :Password');
        $this->dbh->bind(':Username', $_SESSION['Username']);
        $this->dbh->bind(':Password', $_SESSION["Password"]);
         
        $record = $this->dbh->resultSet();
        // echo $record;
        foreach($record as $x){
            $_SESSION["ID_Person"]=$x->ID_Person;
            $this->ID_Person=  $x->ID_Person;     
        }
        
        // $this->dbh->query('UPDATE `person` SET `Username`=:Username, `Address`=:Address ,`Phone_Number`=:Phone_Number,`Backup_Number`=:Backup_Number WHERE ID_Person =:ID_Person');
        // $this->dbh->bind(':ID_Person', $this->ID_Person);
        // $this->dbh->bind(':Username', $this->Username);
    }

    public function UpdateInfo(){
        $this->idp();
        $this->dbh->query('UPDATE `person` SET `Username`=:Username, `Address`=:Address ,`Phone_Number`=:Phone_Number,`Backup_Number`=:Backup_Number WHERE ID_Person =:ID_Person');
        $this->dbh->bind(':ID_Person', $this->ID_Person);
        $this->dbh->bind(':Username', $this->Username);
        $this->dbh->bind(':Address', $this->Address);
        $this->dbh->bind(':Phone_Number', $this->Phone_Number);
        $this->dbh->bind(':Backup_Number', $this->Backup_Number);
        $record = $this->dbh->execute();
        return $record;
    }

    public function Checkoutord()
    {
        // echo $_SESSION['ID_Person'];
        $this->dbh->query('INSERT INTO `orders`(`ID_Person`, `Order_Time`, `Total_Price`) VALUES (:ID_Person, :Order_Time, :Total_Price);');
        $this->dbh->bind(':ID_Person', $this->ID_Person);
        $this->dbh->bind(':Order_Time', $this->Order_Time);
        $this->dbh->bind(':Total_Price', $_SESSION['Total_Price']); 
        $record = $this->dbh->execute();
        return $record;
    }
    public function selectlastid()
    {
        // $this->dbh->query('SELECT MAX( Order_ID ) as max FROM `orders`');
    //    $this->dbh->query('SELECT Order_ID,Total_Price FROM orders ORDER BY Order_ID DESC LIMIT 1');
    //     $record= $this->dbh->resultSet();
    //     foreach($record as $x){
    //         $_SESSION['Order_ID']= $x->Order_ID;
    //    }
        //return $record;

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "repas";
        
        $conn = new mysqli($servername, $username, $password, $dbname);
        $sql ='SELECT Order_ID FROM orders ORDER BY Order_ID DESC LIMIT 1';
        $r2=mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($r2);
        $_SESSION['Order_ID']= $row['Order_ID'];
        // echo $_SESSION['Order_ID'];
    }
    public function Checkoutdet()
    {
        $this->selectlastid();
        
        foreach ($_SESSION["cart"] as $key => $value) {
            $this->dbh->query('INSERT INTO `order_details`(`Order_ID`, `Meal_ID`, `Quantity`) VALUES (:Order_ID, :Meal_ID, :Quantity)');
            $this->dbh->bind(':Order_ID', $_SESSION['Order_ID']);
            $this->dbh->bind(':Meal_ID', $value["Meal_ID"]);
            $this->dbh->bind(':Quantity', $value["Quantity"]); 
            $this->dbh->execute();
        }

        // $servername = "localhost";
        // $username = "root";
        // $password = "";
        // $dbname = "repas";
        
        // $conn = new mysqli($servername, $username, $password, $dbname);
        // foreach ($_SESSION["cart"] as $key => $value) {
        //     $Meal_ID = $value["Meal_ID"];
        //     $ID_Person = $value["ID_Person"];
        //     $sql = "INSERT INTO `order`(`ID_Person`, `Trip_Code`, `Order_Date`, `Total_Price`) VALUES ('$ID_Person','$Trip_Code','$currentDateTime','$Total_Price')";
        //     $r2=mysqli_query($conn,$sql);
        // }
        
    }
}
