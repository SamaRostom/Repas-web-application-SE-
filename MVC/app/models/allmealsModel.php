<?php
require_once 'UserModel.php';

class AllMealsModel extends UserModel
{
    public  $title = 'All Meals Page';

    public function AllMeals()
    {
        $this->dbh->query('SELECT * from person WHERE ID_Person=:ID_Person');
        $this->dbh->bind(':ID_Person', $this->idperson);
         
        $record = $this->dbh->resultSet();

        return $record;
    }
}