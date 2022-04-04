<?php
class ProfileModel extends model
{
    public $title = 'Repas ' . APP_VERSION;
    public $subtitle = 'Example of MVC PHP framework for SE305';
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
