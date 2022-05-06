<?php
class UserModel extends model
{
    protected $username;
    protected $password;

    protected $usernameErr;
    protected $passwordErr;

    public function __construct()
    {
        parent::__construct();
        $this->username    = '';
        $this->password = '';

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
}
