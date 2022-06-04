<?php
require_once 'UserModel.php';
class DeleteCategoryModel extends UserModel
{
    public  $title = 'Delete Category Page';
    public function delete($ID)
    {
        $this->dbh->query('DELETE FROM `meals_category` WHERE ID_Category = :ID_Category');
        $this->dbh->bind(':ID_Category', $ID);
        $record = $this->dbh->execute();

        return $record;
    }
}
?>