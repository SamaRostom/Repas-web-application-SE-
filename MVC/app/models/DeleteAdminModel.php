<?php
require_once 'UserModel.php';
class DeleteAdminModel extends UserModel
{
    public  $title = 'Delete Admin Page';
    public function delete($ID)
    {
        $this->dbh->query('DELETE FROM `person` WHERE ID_Person = :ID_Person');
        $this->dbh->bind(':ID_Person', $ID);
        $record = $this->dbh->execute();

        return $record;
    }
}
?>