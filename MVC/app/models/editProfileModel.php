<?php
require_once 'UserModel.php';
class editProfileModel extends UserModel
{
    public  $title = 'Edit Profile Page';
    protected $Username;
    protected $UsernameErr;
    protected $Password;
    protected $PasswordErr;
    protected $Address;
    protected $AddressErr;
    protected $Phone_Number;
    protected $Phone_NumberErr;
    protected $Backup_Number;
    protected $Backup_NumberErr;


    public function __construct()
    {
         parent::__construct();
        $this->Username     = "";
        $this->UsernameErr = "";

        $this->Password = "";
        $this->PasswordErr = "";

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

    public function getUsernameErr()
    {
        return $this->UsernameErr;
    }

    public function setUsernameErr($UsernameErr)
    {
        $this->UsernameErr = $UsernameErr;
    }

    public function getPassword()
    {
        return $this->Password;
    }
    public function setPassword($Password)
    {
        $this->Password = $Password;
    }

    public function getPasswordErr()
    {
        return $this->PasswordErr;
    }
    public function setPasswordErr($PasswordErr)
    {
        $this->PasswordErr = $PasswordErr;
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
    }


    public function updateProfile()
    {
        $this->idp();
        $this->dbh->query('UPDATE person SET Username=:Username, Password=:Password, Address=:Address, Phone_Number=:Phone_Number, Backup_Number=:Backup_Number WHERE ID_Person=:ID_Person');
        $this->dbh->bind(':ID_Person', $_SESSION['ID_Person']);
        $this->dbh->bind(':Username', $this->Username);
        $this->dbh->bind(':Password', $this->Password);
        $this->dbh->bind(':Address', $this->Address);
        $this->dbh->bind(':Phone_Number', $this->Phone_Number);
        $this->dbh->bind(':Backup_Number', $this->Backup_Number);
        return $this->dbh->execute();
    }
}
