<?php
require_once 'UserModel.php';
class ViewUserModel extends UserModel
{
    public  $title = 'User View Page';
	
	public function viewuser()
    {
        $sql=$this->dbh->query("SELECT * FROM `users`");
 
        
        //echo $this->dbh->execute();
		echo $sql;
    }
}
?>