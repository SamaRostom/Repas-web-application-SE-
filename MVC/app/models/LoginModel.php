<?php
require_once 'UserModel.php';
class LoginModel extends UserModel
{
    public  $title = 'Login Page';

    public function login()
    {
        $this->dbh->query('SELECT * from person WHERE Username = :Username AND Password = :Password');
        $this->dbh->bind(':Username', $this->username);
        $this->dbh->bind(':Password', $this->password);
         
        $record = $this->dbh->single();
        // $hash_pass = $record->password;

        // if (password_verify($this->password,  $hash_pass)) {
        //     return $record;
        // } else {
        //     return false;
        // }
        return $record;

        // $sql="SELECT * FROM person WHERE Email='".$_POST['Email']."' AND Password='".$_POST['Password']."'";
	    // $result = mysqli_query($conn, $sql);
	    // $row = mysqli_fetch_array($result); 
    }
}
