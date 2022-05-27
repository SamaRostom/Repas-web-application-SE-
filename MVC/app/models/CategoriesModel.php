<?php
require_once 'UserModel.php';

class CategoriesModel extends UserModel
{
    public  $title = 'Categories Page';
    protected $ID_Category,$Category_Name,$Category_Image;

    public function __construct()
    {
        parent::__construct();
        $this->ID_Category    = '';
        $this->Category_Name = '';
        $this->Category_Image    = '';
    }

    public function getID_Category()
    {
        return $this->ID_Category;
    }
    public function setID_Category($ID_Category)
    {
        $this->ID_Category = $ID_Category;
    }

    public function getCategory_Name()
    {
        return $this->Category_Name;
    }
    public function setCategory_Name($Category_Name)
    {
        $this->Category_Name = $Category_Name;
    }
    public function getCategory_Image()
    {
        return $this->Category_Image;
    }
    public function setCategory_Image($Category_Image)
    {
        $this->Category_Image = $Category_Image;
    }

    public function MealsCatgories()
    {
        $this->dbh->query('SELECT * from meals_category');
        
        $record = $this->dbh->resultSet();

        return $record;
    }
}