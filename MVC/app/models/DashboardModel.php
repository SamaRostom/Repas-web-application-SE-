<?php
require_once 'UserModel.php';
class DashboardModel extends UserModel
{
    public  $title = 'Dashboard Page';

    public function dashboard()
    {
        
    }

    public function TotalNumberofUsers()
    {
        $this->dbh->query('SELECT ID_Person FROM person WHERE ID_Type=2');
         
        $record = $this->dbh->execute();
        $TotalNumberofUsers = $this->dbh->rowCount();
        $_SESSION['tnu']=$TotalNumberofUsers;
        return $TotalNumberofUsers;
        
        
        // $conn = new mysqli("localhost", "root", "", "repas");
        // $ss = "SELECT COUNT(ID_Person) AS TotalNumberofHikers FROM person WHERE ID_Type=2"  ;
        // $rr = mysqli_query ($conn ,$ss);
        // $dd =  mysqli_fetch_assoc($rr);
        // $TotalNumberofHikers=$dd['TotalNumberofHikers'];
        // $_SESSION['tnu']=$TotalNumberofHikers;
        // return $TotalNumberofHikers;
    }

    public function TotalNumberofMeals()
    {
        $this->dbh->query('SELECT Meal_Id FROM meals');
         
        $record = $this->dbh->execute();
        $tnm = $this->dbh->rowCount();
        $_SESSION['tnm']=$tnm;
        return $tnm;
    }

    public function TotalNumberofOrders()
    {
        $this->dbh->query('SELECT Order_ID FROM orders');
         
        $record = $this->dbh->execute();
        $tno = $this->dbh->rowCount();
        $_SESSION['tno']=$tno;
        return $tno;
    }
    
    public function TotalRevenue()
    {
        $this->dbh->query('SELECT * FROM orders');
        $tr=0; 
        $record = $this->dbh->resultSet();
        foreach($record as $x){
            $tr+=$x->Total_Price;
        }
        return $tr;
    }

    public function TopMeal()
    {
        $this->dbh->query('SELECT M.Meal_ID, M.Description, M.Meal_Name, M.Meal_Price, M.Meal_Image, M.ID_Category, COUNT(O.Meal_ID) as MealCount FROM `order_details` as O INNER JOIN  `meals` as M ON O.Meal_ID = M.Meal_ID GROUP BY M.Meal_ID ORDER BY MealCount DESC LIMIT 1');
        $record = $this->dbh->resultSet();

        return $record;
    }

    public function usersc(){
        $this->dbh->query('SELECT * FROM person WHERE ID_Type=2');
        $record = $this->dbh->resultSet();

        return $record;
       
    }

    public function adminsc(){
        $this->dbh->query('SELECT * FROM person WHERE ID_Type=1');
        $record = $this->dbh->resultSet();

        return $record;
       
    }
    
    public function ordersc(){
        //$this->dbh->query('SELECT * FROM orders');
        $this->dbh->query('select
        o.Order_ID,
        o.Order_Time,
        o.Total_Price,
        m.Meal_Name,
        p.Username,
        oi.Quantity FROM
        orders o
        inner join order_details oi on oi.Order_ID = o.Order_ID
        inner join meals m on m.Meal_ID = oi.Meal_ID
        inner join person p on p.ID_Person = o.ID_Person GROUP BY ORDER_ID');
        $record = $this->dbh->resultSet();

        return $record;
       
    }
    public function ord(){
        //$this->dbh->query('SELECT * FROM orders');
        $this->dbh->query('select
        o.Order_ID,
        o.Order_Time,
        o.Total_Price,
        m.Meal_Name,
        p.Username,
        oi.Quantity FROM
        orders o
        inner join order_details oi on oi.Order_ID = o.Order_ID
        inner join meals m on m.Meal_ID = oi.Meal_ID
        inner join person p on p.ID_Person = o.ID_Person WHERE oi.Order_ID= :Order_ID');
        $this->dbh->bind(':Order_ID',$_SESSION['Order']);
        $record = $this->dbh->resultSet();

        return $record;
       
    }

    // public function deleteadmin($ID){
    //     $this->dbh->query('DELETE FROM `person` WHERE ID_Person = :ID_Person');
    //     $this->dbh->bind(':ID_Person', $ID);
    //     $record = $this->dbh->execute();

    //     return $record;
       
    // }
}