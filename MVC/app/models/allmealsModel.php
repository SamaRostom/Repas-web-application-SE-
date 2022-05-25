<?php
require_once 'UserModel.php';

class AllMealsModel extends UserModel
{
    public  $title = 'All Meals Page';

    public function MealsCatgories()
    {
        $this->dbh->query('SELECT * from meals_category WHERE ID_Category=:ID_Category');
        $this->dbh->bind(':ID_Category', $this->idcategory);
        
        $record = $this->dbh->resultSet();

        return $record;
    }
}