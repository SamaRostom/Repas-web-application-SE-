<?php
require_once 'UserModel.php';
class LoginModel extends UserModel
{
    public  $title = 'Login Page';

    public function login()
    {
        $this->dbh->query('SELECT * from person WHERE Username = :Username');
        $this->dbh->bind(':Username', $this->username);

        $record = $this->dbh->single();
        $hash_pass = $record->password;

        if (password_verify($this->password,  $hash_pass)) {
            return $record;
        } else {
            return false;
        }
    }
}
