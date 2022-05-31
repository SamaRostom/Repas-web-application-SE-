<?php
require_once 'UserModel.php';
class ProfileModel extends UserModel
{
    public  $title = 'Profile Page';
    public $ID_Person,$Username,$ID_Type,$Address;

    public function __construct()
    {
        parent::__construct();
        $this->ID_Person    = '';
        $this->Username = '';
        $this->ID_Type    = '';
        $this->Address    = '';
    }

    public function getID_Person()
    {
        return $this->ID_Person;
    }
    public function setID_Person($ID_Person)
    {
        $this->ID_Person = $ID_Person;
    }

    public function getUsername()
    {
        return $this->Username;
    }
    public function setUsername($Username)
    {
        $this->Username = $Username;
    }
    public function getID_Type()
    {
        return $this->ID_Type;
    }
    public function setID_Type($ID_Type)
    {
        $this->ID_Type = $ID_Type;
    }
    public function getAddress()
    {
        return $this->Address;
    }
    public function setAddress($Address)
    {
        $this->Address = $Address;
    }

    public function ViewProfile()
    {
        $this->dbh->query('SELECT * from person WHERE ID_Person=:ID_Person');
        $this->dbh->bind(':ID_Person', $this->ID_Person);
         
        $record = $this->dbh->resultSet();


    //     while($row=$this->dbh->resultSet()){
        
    //     $this->address=$row['Address'];
    //     $this->phonenum=$row['Phone_Number'];
    //     $this->backupnum=$row['Backup_Number'];
    // }

        return $record;
    }
}


// <?php
// require_once 'UserModel.php';
// class ProfileModel extends UserModel
// {
//     public  $title = 'Profile Page';

//     public function Profile()
//     {
//         $this->dbh->query('SELECT * from person');
//         $this->dbh->bind(':Username', $this->username);

//         $record = $this->dbh->single();
//         $hash_pass = $record->password;

//         if (password_verify($this->password,  $hash_pass)) {
//             return $record;
//         } else {
//             return false;
//         }
//     }
// }
