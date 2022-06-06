<?php
require_once 'UserModel.php';
class DeleteMealsModel extends UserModel
{
    public  $title = 'Delete Meal Page';
    public function delete($ID)
    {
        $this->dbh->query('DELETE FROM `meals` WHERE Meal_ID = :Meal_ID');
        $this->dbh->bind(':Meal_ID', $ID);
        $record = $this->dbh->execute();

        return $record;
    }
}
?>