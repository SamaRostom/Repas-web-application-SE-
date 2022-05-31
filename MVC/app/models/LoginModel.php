<?php
require_once 'UserModel.php';
class LoginModel extends UserModel
{
    public  $title = 'Login Page';

    //protected $ID_Type;
    public function login()
    {
        $this->dbh->query('SELECT * from person WHERE Username = :Username AND Password = :Password');
        $this->dbh->bind(':Username', $this->username);
        $this->dbh->bind(':Password', $this->password);
         
        $record = $this->dbh->resultSet();
        // echo $record;
        foreach($record as $x){
            $_SESSION["ID_Type"]=$x->ID_Type;
            $_SESSION["Password"]=$x->Password;
            $_SESSION["Address"]=$x->Address;
            $_SESSION["Phone_Number"]=$x->Phone_Number;
            $_SESSION["Backup_Number"]=$x->Backup_Number;        
        }

        // $this->ID_Type = $record[3];
        // echo $this->ID_Type;
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


    // public function setID_Type($ID_Type)
    // {
    //     $this->ID_Type = $ID_Type;
    // }
    // public function usertype_pages()
    // {
    //     $this->dbh->query('SELECT PageID FROM `usertype_pages` WHERE ID_Type = :ID_Type');
    //     $this->dbh->bind(':ID_Type', $this->ID_Type);
         
    //     $record = $this->dbh->resultSet();
    //     return $record;
    // }
    // public function getID_Type(){
    //     return $this->ID_Type;
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
