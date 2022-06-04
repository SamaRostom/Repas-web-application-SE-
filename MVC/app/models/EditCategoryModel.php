<?php
require_once 'UserModel.php';

class EditCategoryModel extends UserModel
{
    public  $title = 'Edit Categories Page';
    protected $ID_Category,$Category_Name,$Category_Image,$Category_NameErr;

    public function __construct()
    {
        parent::__construct();
        $this->ID_Category    = '';
        $this->Category_Name = '';
        $this->Category_Image    = '';
        $this->Category_NameErr = '';
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
    public function getCategory_NameErr()
    {
        return $this->Category_NameErr;
    }
    public function setCategory_NameErr($Category_NameErr)
    {
        $this->Category_NameErr = $Category_NameErr;
    }

    public function getCategory_Image()
    {
        return $this->Category_Image;
    }
    public function setCategory_Image($Category_Image)
    {
        $this->Category_Image = $Category_Image;
    }
    public function setallcat(){
        $this->dbh->query("SELECT * WHERE ID_Category=:ID_Category");
        $this->dbh->bind(':ID_Category', $this->ID_Category);

        return $this->dbh->resultSet();
    }

    public function editcategory(){
        $this->dbh->query("UPDATE meals_category SET Category_Name = :Category_Name , Category_Image =:Category_Image WHERE ID_Category=:ID_Category");
        $this->dbh->bind(':Category_Name', $this->Category_Name);
        $this->dbh->bind(':Category_Image', $this->Category_Image);

        return $this->dbh->execute();
    }
}