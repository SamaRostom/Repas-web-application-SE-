<?php
class UserModel extends model
{
    public $username;
    protected $password;
    public $ID_Type;
    public $ID_Person;
    protected $usernameErr;
    protected $passwordErr;

    public function __construct()
    {
        parent::__construct();
        $this->username    = '';
        $this->password = '';
        $this->ID_Type = '';
        $this->ID_Person = '';
        $this->usernameErr    = '';
        $this->passwordErr = '';
    }

    public function getUsername()
    {
        return $this->username;
    }
    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getPassword()
    {
        return $this->password;
    }
    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getID_Type()
    {
        return $this->ID_Type;
    }
    public function setID_Type($ID_Type)
    {
        $this->ID_Type = $ID_Type;
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
        return $this->usernameErr;
    }
    public function setUsernameErr($usernameErr)
    {
        $this->usernameErr = $usernameErr;
    }

    public function getPasswordErr()
    {
        return $this->passwordErr;
    }
    public function setPasswordErr($passwordErr)
    {
        $this->passwordErr = $passwordErr;
    }

    public function findUserByUsername($username)
    {
        $this->dbh->query('select * from person where Username= :Username');
        $this->dbh->bind(':Username', $username);

        $userRecord = $this->dbh->single();
        return $this->dbh->rowCount();
    }

    public function usernameExist($username)
    {
        return $this->findUserByUsername($username) > 0;
    }

    // public function login()
    // {
    //     $this->dbh->query("SELECT * FROM person WHERE Username=:Username AND Password=:Password");
    //     $this->dbh->bind(':Username', $username);
    //     $this->dbh->bind(':Password', $Password);

    //     // $userRecord = $this->dbh->single();
    //     return $this->dbh->resultSet();
    // }

    public function ID_Type(){
        
        $this->dbh->query('SELECT ID_Type FROM `person` WHERE Username = :Username AND Password = :Password');
        $this->dbh->bind(':Username', $this->username);
        $this->dbh->bind(':Password', $this->password);

        // $record = $this->dbh->resultSet();
        // $this->ID_Type= $record["ID_Type"];
        // echo $this->ID_Type;
        $record = $this->dbh->single();
        return $record;
    }
}
