<?php
require_once 'UserModel.php';
class ProfileModel extends UserModel
{
    public  $title = 'Profile Page';

    public function ViewProfile()
    {
        $this->dbh->query('SELECT * from person WHERE ID_Person=:ID_Person');
        $this->dbh->bind(':ID_Person', $this->idperson);
         
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
