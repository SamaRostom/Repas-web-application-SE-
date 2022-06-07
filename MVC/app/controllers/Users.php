<?php
class Users extends Controller
{
    public function register()
    {
        $registerModel = $this->getModel();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            $registerModel->setUsername(trim($_POST['Username']));
            $registerModel->setPassword(trim($_POST['Password']));
            $registerModel->setAddress(trim($_POST['Address']));
            $registerModel->setPhone_Number(trim($_POST['Phone_Number']));
            $registerModel->setBackup_Number(trim($_POST['Backup_Number']));
            //validation
            if (empty($registerModel->getUsername())) {
                $registerModel->setUsernameErr('Please enter a name');
            }
            if (empty($registerModel->getPassword())) {
                $registerModel->setPasswordErr('Please enter a password');
            } elseif (strlen($registerModel->getPassword()) < 4) {
                $registerModel->setPasswordErr('Password must contain at least 4 characters');
            }
            if (empty($registerModel->getAddress())) {
                $registerModel->setAddressErr('Please enter your address');
            } 
            if (empty($registerModel->getPhone_Number())) {
                $registerModel->setPhone_NumberErr('Please enter a phone number');
            }
            if (empty($registerModel->getBackup_Number())) {
                $registerModel->setBackup_NumberErr('Please enter a backup phone number');
            }

            if (
                empty($registerModel->getUsernameErr()) &&
                empty($registerModel->getPasswordErr()) &&
                empty($registerModel->getAddressErr()) &&
                empty($registerModel->getPhone_NumberErr()) &&
                empty($registerModel->getBackup_NumberErr())
            ) {
                //Hash Password
                // $registerModel->setPassword(password_hash($registerModel->getPassword(), PASSWORD_DEFAULT));

                $rr = $registerModel->signup();
                if ($rr) {
                    //header('location: ' . URLROOT . 'users/login');
                    flash('register_success', 'You have registered successfully');
                    redirect('users/login');
                } else {
                    die('Error in sign up');
                }
            }
            else{
                //echo $userModel->getUsernameErr() . $userModel->getPasswordErr();
                echo $registerModel->getUsernameErr() . $registerModel->getPasswordErr() . $registerModel->getAddressErr() . $registerModel->getPhone_NumberErr() . $registerModel->getBackup_NumberErr();
                //call static function
                // echo "<script>alert('$v');</script>";
            }
        }
        // Load form
        //echo 'Load form, Request method: ' . $_SERVER['REQUEST_METHOD'];
        $viewPath = VIEWS_PATH . 'users/Register.php';
        require_once $viewPath;
        $view = new Register($this->getModel(), $this);
        $view->output();
    }
    public function login()
    {
        $userModel = $this->getModel();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //process form
            $userModel->setUsername(trim($_POST['Username']));
            $userModel->setPassword(trim($_POST['password']));

            //validate login form
            if (empty($userModel->getUsername())) {
                $userModel->setUsernameErr('Please enter an username');
            } elseif (!($userModel->usernameExist($_POST['Username']))) {
                $userModel->setUsernameErr('No user found');
            }

            if (empty($userModel->getPassword())) {
                $userModel->setPasswordErr("
                <script type='text/javascript'>
               var x= document.getElementById('7aga');
            //   x.style.display='block';
                setTimeout(function () {
          
                    // Closing the alert
                    $('.alert').alert('close');
                }, 5000);
            </script>");
            } elseif (strlen($userModel->getPassword()) < 4) {
                $userModel->setPasswordErr('Password must contain at least 4 characters');
            }

            // If no errors
            if (
                empty($userModel->getUsernameErr()) &&
                empty($userModel->getPasswordErr())
            ) {
                //Check login is correct
                $loggedUser = $userModel->login();
                // echo "<script>alert('$loggedUser');</script>";
                if ($loggedUser) {
                    // $userModel->ID_Type();
                    // $_SESSION['ID_Type'] = $userModel->getID_Type();
                    //create related session variables
                    $this->createUserSession($userModel);
                    // if($_SESSION['ID_Type']=="1"){
                    //     redirect('pages/about');
                    // }
                    die('Success log in User');
                    // redirect('public/public');
                    flash('login_success', 'You have logged in successfully');
                    // redirect('users/Register');
                    header('location: ' . URLROOT.'users/Categories' );
                } else {
                    $userModel->setPasswordErr('Password is not correct');
                }
            }
            else{
                //echo $userModel->getUsernameErr() . $userModel->getPasswordErr();
                echo $userModel->getUsernameErr() . $userModel->getPasswordErr();
                //call static function
                // echo "<script>alert('$v');</script>";
            }

        }
        // Load form
        //echo 'Load form, Request method: ' . $_SERVER['REQUEST_METHOD'];
        $viewPath = VIEWS_PATH . 'users/Login.php';
        require_once $viewPath;
        $view = new Login($userModel, $this);
        $view->output();
    }
	
	public function viewuser()
    {
		$viewPath = VIEWS_PATH . 'users/ViewUser.php';
        $viewuserModel = $this->getModel();
		
        $view = new ViewUserModel($viewuserModel, $this);
        $view->viewuser();
    }

    public function createUserSession($UserModel)
    {
        $_SESSION['ID_Person'] = $UserModel->ID_Person;
        $_SESSION['Username'] = $UserModel->username;
        //$_SESSION['ID_Type'] = $UserModel->ID_Type;
        header('location: ' . URLROOT . 'pages');
        // redirect('pages');
    }

    public function logout()
    {
        echo 'logout called';
        unset($_SESSION['ID_Person']);
        unset($_SESSION['Username']);
        session_destroy();
        redirect('users/login');
    }

    public function isLoggedIn()
    {
        return isset($_SESSION['user_id']);
    }


    public function cart()
    {
        if (isset($_GET["action"]))
        {
            if ($_GET["action"] == "delete")
            {
                foreach ($_SESSION["cart"] as $keys => $value)
                {
                    if ($value["Meal_ID"] == $_GET["id"])
                    {
                        unset($_SESSION["cart"][$keys]);
                        echo '<script>alert("Meal has been Removed...!")</script>';
                    }
                }
            }
        }

		$viewPath = VIEWS_PATH . 'users/Cart.php';
        require_once $viewPath;
        $cartModel = $this->getModel();
        $view = new Cart($cartModel, $this);
        $view->output();
    }

    public function Categories()
    {
        $CatModel = $this->getModel();

        // if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //     //process form
        //     $CatModel->setID_Category(trim($_GET['id'])); 
           
        // }

        $viewPath = VIEWS_PATH . 'users/Categories.php';
        require_once $viewPath;
        $CategoriesView = new Categories($this->getModel(), $this);
        // if(isset($_SESSION['ID_Person'])){
            if($_SESSION['ID_Type']=="1"){
                $CategoriesView->outputa();
            }
        // }
        else{
            $CategoriesView->output();
        }
        
    }

    public function MealsDetails()
    {
        // $viewPath = VIEWS_PATH . 'users/MealsDetails.php';
        // require_once $viewPath;
        // $MealsDetailsView = new MealsDetails($this->getModel(), $this);
        // $MealsDetailsView->output();

        $userModel = $this->getModel();
        //$_SESSION['Category_ID']=$_GET['id'];
        $userModel->setMeal_ID($_GET['id']);

         if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //process form
            if (isset($_SESSION['ID_Person'])){
                if (isset($_SESSION["cart"])){
                    $item_array_id = array_column($_SESSION["cart"],"Meal_ID");
                    if (!in_array($_SESSION["Meal_ID"],$item_array_id)){
                        $_SESSION["Quantity"]=1;
                        $count = count($_SESSION["cart"]);
                        $item_array = array(
                            'Meal_ID' => $_SESSION["Meal_ID"],
                            'Meal_Name' => $_SESSION["Meal_Name"],
                            'Quantity' => $_SESSION["Quantity"],
                            'Meal_Price' => $_SESSION["Meal_Price"],
                        );
                        $_SESSION["cart"][$count] = $item_array;
                    }else{
                        // echo $_SESSION["cart"];
                        // $userModel->Quantity();
                        $_SESSION["Quantity"]+=1;
                        echo '<script>alert("Meal is already Added to Cart")</script>';
                    }
                    $userModel->Quantity();
                    // $userModel->setQuantity($_SESSION["Quantity"]);
                }else{
                    $item_array = array(
                    'Meal_ID' => $_SESSION["Meal_ID"],
                    'Meal_Name' => $_SESSION["Meal_Name"],
                    'Quantity' => $_SESSION["Quantity"],
                    'Meal_Price' => $_SESSION["Meal_Price"],
                    );
                    $_SESSION["cart"][0] = $item_array;
                }
            }
            else{
                echo '<script>alert("You need to login or signup")</script>';
            }  
        }

        $viewPath = VIEWS_PATH . 'users/MealsDetails.php';
        require_once $viewPath;
        $MealsDetailsView = new MealsDetails($userModel, $this);
        $MealsDetailsView->output();

    }

    public function Checkout()
    {

        $registerModel = $this->getModel();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $currentDate = date('Y-m-d H:i:s');
            $registerModel->setOrder_Time(trim($currentDate));
            $registerModel->setUsername(trim($_POST['Username']));
            $registerModel->setAddress(trim($_POST['Address']));
            $registerModel->setPhone_Number(trim($_POST['Phone_Number']));
            $registerModel->setBackup_Number(trim($_POST['Backup_Number']));
            if (empty($registerModel->getUsername())) {
                $registerModel->setUsernameErr('Please enter a name');
            }
            if (empty($registerModel->getAddress())) {
                $registerModel->setAddressErr('Please enter your address');
            } 
            if (empty($registerModel->getPhone_Number())) {
                $registerModel->setPhone_NumberErr('Please enter a phone number');
            }
            if (empty($registerModel->getBackup_Number())) {
                $registerModel->setBackup_NumberErr('Please enter a backup phone number');
            }

            if (
                empty($registerModel->getUsernameErr()) &&
                empty($registerModel->getAddressErr()) &&
                empty($registerModel->getPhone_NumberErr()) &&
                empty($registerModel->getBackup_NumberErr())
            ) {
                $rr = $registerModel->UpdateInfo();
                $rr2 = $registerModel->Checkoutord();
                // $rr4 = $registerModel->selectlastid();
                $rr3 = $registerModel->Checkoutdet();
                if ($rr && $rr2 && $rr3) {
                    flash('register_success', 'You have registered successfully');
                    // redirect('users/login');
                } else {
                    die('Error in sign up');
                }
            }
            else{
                echo $registerModel->getUsernameErr() . $registerModel->getAddressErr() . $registerModel->getPhone_NumberErr() . $registerModel->getBackup_NumberErr();

            }
        }
        $viewPath = VIEWS_PATH . 'users/Checkout.php';
        require_once $viewPath;
        $CheckoutView = new Checkout($this->getModel(), $this);
        $CheckoutView->output();
    }

    public function Meals()
    {
        $userModel = $this->getModel();
        $_SESSION['Category_ID']=$_GET['ids'];
        $userModel->setID_Category($_GET['ids']);
        $viewPath = VIEWS_PATH . 'users/Meals.php';
        require_once $viewPath;
        $MealsView = new Meals($this->getModel(), $this);

        if($_SESSION['ID_Type']=="1"){
                $MealsView->outputa();
            }
      
        else{
            // $userModel->setID_Category($_GET['ids']);
            $MealsView->output();
        }
        
    }

    public function DeleteMeals()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $userModel = $this->getModel();
            $userModel->delete($_GET['id']);
            redirect('users/categories');
        }
 
    }

    public function EditMeal(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $EditmealModel = $this->getModel();
            $EditmealModel->setMeal_ID(trim($_GET['id']));
        
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST["Edit"])){

            $EditmealModel->setMeal_Name(trim($_POST['Meal_Name']));
            $EditmealModel->setDescription(trim($_POST['Description']));
            $EditmealModel->setMeal_Price(trim($_POST['Meal_Price']));
            $EditmealModel->setAmount(trim($_POST['Amount']));
            $EditmealModel->setMeal_Image(trim($_POST['Meal_Image']));

            if (empty($EditmealModel->getMeal_Name())) {
                $EditmealModel->setMeal_NameErr('Please enter a Meal name');
            }

            if (empty($EditmealModel->getMeal_NameErr())) {

                $rr = $EditmealModel->editMeal();
                if ($rr) {
                    flash('register_success', 'You have edited successfully');
                    redirect('users/Categories');
                } else {
                    die('Error in add');
                }
            }
            else{
                echo $EditmealModel->getMeal_NameErr();
            }
        }
    }
    }
        $viewPath = VIEWS_PATH . 'users/EditMeal.php';
        require_once $viewPath;
        $EditmealView = new EditMeal($this->getModel(), $this);
        $EditmealView->output();
    }

    public function AddMeal()
    {
        $MealModel = $this->getModel();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            $MealModel->setMeal_Name(trim($_POST['Meal_Name']));
            $MealModel->setDescription(trim($_POST['Description']));
            $MealModel->setMeal_Price(trim($_POST['Meal_Price']));
            $MealModel->setMeal_Image(trim($_POST['Meal_Image']));

            if (empty($MealModel->getMeal_Name())) {
                $MealModel->setMeal_NameErr('Please enter a meal name');
            }

            if (empty($MealModel->getDescription())) {
                $MealModel->setDescriptionErr('Please enter a description');
            }

            if (empty($MealModel->getMeal_Price())) {
                $MealModel->setMeal_PriceErr('Please enter a meal price');
            }


            if(empty($MealModel->getMeal_NameErr()) && empty($MealModel->getDescriptionErr()) && empty($MealModel->getMeal_PriceErr())){
                $mm = $MealModel->addmeal();
                if($mm) {
                    flash('register_success', 'You have added successfully');
                    redirect('users/Categories');
                } else {
                    die('Error in add');
                }
            }

            else{
                echo $MealModel->getMeal_NameErr();
                echo $MealModel->getDescriptionErr();
                echo $MealModel->getMeal_PriceErr();
            }
        }
        
        $viewPath = VIEWS_PATH . 'users/AddMeal.php';
        require_once $viewPath;
        $AddMealView = new AddMeal($this->getModel(), $this);
        $AddMealView->output();
    }

    public function Dashboard()
    {
        $viewPath = VIEWS_PATH . 'users/Dashboard.php';
        require_once $viewPath;
        $DashboardView = new Dashboard($this->getModel(), $this);
        $DashboardView->output();

    }

    public function AddAdmin()
    {
        $registerModel = $this->getModel();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            $registerModel->setUsername(trim($_POST['Username']));
            $registerModel->setPassword(trim($_POST['Password']));
            $registerModel->setAddress(trim($_POST['Address']));
            $registerModel->setPhone_Number(trim($_POST['Phone_Number']));
            $registerModel->setBackup_Number(trim($_POST['Backup_Number']));
            //validation
            if (empty($registerModel->getUsername())) {
                $registerModel->setUsernameErr('Please enter a name');
            }
            if (empty($registerModel->getPassword())) {
                $registerModel->setPasswordErr('Please enter a password');
            } elseif (strlen($registerModel->getPassword()) < 4) {
                $registerModel->setPasswordErr('Password must contain at least 4 characters');
            }
            if (empty($registerModel->getAddress())) {
                $registerModel->setAddressErr('Please enter your address');
            } 
            if (empty($registerModel->getPhone_Number())) {
                $registerModel->setPhone_NumberErr('Please enter a phone number');
            }
            if (empty($registerModel->getBackup_Number())) {
                $registerModel->setBackup_NumberErr('Please enter a backup phone number');
            }

            if (
                empty($registerModel->getUsernameErr()) &&
                empty($registerModel->getPasswordErr()) &&
                empty($registerModel->getAddressErr()) &&
                empty($registerModel->getPhone_NumberErr()) &&
                empty($registerModel->getBackup_NumberErr())
            ) {
                //Hash Password
                // $registerModel->setPassword(password_hash($registerModel->getPassword(), PASSWORD_DEFAULT));

                $rr = $registerModel->addadmin();
                if ($rr) {
                    //header('location: ' . URLROOT . 'users/login');
                    flash('register_success', 'You have added successfully');
                    redirect('users/dashboard');
                } else {
                    die('Error in add');
                }
            }
            else{
                //echo $userModel->getUsernameErr() . $userModel->getPasswordErr();
                echo $registerModel->getUsernameErr() . $registerModel->getPasswordErr() . $registerModel->getAddressErr() . $registerModel->getPhone_NumberErr() . $registerModel->getBackup_NumberErr();
                //call static function
                // echo "<script>alert('$v');</script>";
            }
        }
        $viewPath = VIEWS_PATH . 'users/AddAdmin.php';
        require_once $viewPath;
        $AddAdminView = new AddAdmin($this->getModel(), $this);
        $AddAdminView->output();

    }

    public function AddCategory(){
        $registerModel = $this->getModel();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            $registerModel->setCategory_Name(trim($_POST['Category_Name']));
            $registerModel->setCategory_Image(trim($_POST['Category_Image']));

            if (empty($registerModel->getCategory_Name())) {
                $registerModel->setCategory_NameErr('Please enter a category name');
            }

            if (empty($registerModel->getCategory_NameErr())) {

                $rr = $registerModel->addcategory();
                if ($rr) {
                    flash('register_success', 'You have added successfully');
                    redirect('users/Categories');
                } else {
                    die('Error in add');
                }
            }
            else{
                echo $registerModel->getCategory_NameErr();
            }
        }
        $viewPath = VIEWS_PATH . 'users/AddCategory.php';
        require_once $viewPath;
        $AddCategoryView = new AddCategory($this->getModel(), $this);
        $AddCategoryView->output();
    }

    public function Catering()
    {
        $registerModel = $this->getModel();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Process form
            $currentDate = date('Y-m-d');

            $registerModel->setNumberOfPeople(trim($_POST['adultno']));
            $registerModel->setNumberOfChildern(trim($_POST['childno']));
            $registerModel->setMeals(trim($_POST['food']));
            $registerModel->setExtras(trim($_POST['extras']));
            $registerModel->setCatering_Time(trim($_POST['catering-time']));
            $registerModel->setOrder_Time_Catering(trim($currentDate));
            $registerModel->setFood_Allergy(trim($_POST['allergy']));
            //validation
            if (empty($registerModel->getNumberOfPeople())) {
                $registerModel->setNumberOfPeopleErr('Please enter number of adults');
            }
            if (empty($registerModel->getMeals())) {
                $registerModel->setMealsErr('Please enter the meals');
            } 
            if (empty($registerModel->getCatering_Time())) {
                $registerModel->setCatering_TimeErr('Please enter the catering date');
            } 

            if (
                empty($registerModel->getNumberOfPeopleErr()) &&
                empty($registerModel->getMealsErr()) &&
                empty($registerModel->getCatering_TimeErr()) 
            ) {
                
                $rr = $registerModel->addcatering();
                if ($rr) {
                    flash('register_success', 'You have added successfully');
                    header('location: ' . URLROOT);
                } else {
                    die('Error in add');
                }
            }
            else{
                echo $registerModel->getNumberOfPeopleErr() . $registerModel->getMealsErr() . $registerModel->getCatering_TimeErr();
            }
        }
        $viewPath = VIEWS_PATH . 'users/Catering.php';
        require_once $viewPath;
        $CateringView = new Catering($this->getModel(), $this);
        if(isset($_SESSION['ID_Type'])){
            if($_SESSION['ID_Type']=="1"){
                $CateringView->outputa();
            }
            else if($_SESSION['ID_Type']=="2"){
                $CateringView->output();
            }
        }
    }

    public function EditCategory(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $registerModel = $this->getModel();
            $_SESSION['ID_Category']=$_GET['id'];
            $registerModel->setID_Category(trim($_GET['id']));
        
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST["Edit"])){
            // Process form
            // $registerModel->setID_Category(trim($_GET['id']));
            $registerModel->setCategory_Name(trim($_POST['Category_Name']));
            $registerModel->setCategory_Image(trim($_POST['Category_Image']));

            if (empty($registerModel->getCategory_Name())) {
                $registerModel->setCategory_NameErr('Please enter a category name');
            }

            if (empty($registerModel->getCategory_NameErr())) {

                $rr = $registerModel->editcategory();
                if ($rr) {
                    flash('register_success', 'You have edited successfully');
                    redirect('users/Categories');
                } else {
                    die('Error in add');
                }
            }
            else{
                echo $registerModel->getCategory_NameErr();
            }
        }
    }
    }
        $viewPath = VIEWS_PATH . 'users/EditCategory.php';
        require_once $viewPath;
        $EditCategoryView = new EditCategory($this->getModel(), $this);
        $EditCategoryView->output();
    }

    public function DeleteCategory()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $userModel = $this->getModel();
            $userModel->delete($_GET['id']);
            redirect('users/categories');
        }
 
    }

    public function DeleteAdmin()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $userModel = $this->getModel();
            $userModel->delete($_GET['id']);
            redirect('users/dashboard');
        }
 
    }

    public function Profile()
    {
        $viewPath = VIEWS_PATH . 'users/Profile.php';
        require_once $viewPath;
        $ProfileView = new Profile($this->getModel(), $this);
        $ProfileView->output();
    }

    public function editProfile()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $UpdateProfileModel = $this->getModel();
            // $EditProfileModel->setMeal_ID(trim($_GET['id']));
        
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST["Edit"])){

            $UpdateProfileModel->setUsername(trim($_POST['Username']));
            $UpdateProfileModel->setPassword(trim($_POST['Password']));
            $UpdateProfileModel->setAddress(trim($_POST['Address']));
            $UpdateProfileModel->setPhone_Number(trim($_POST['Phone_Number']));
            $UpdateProfileModel->setBackup_Number(trim($_POST['Backup_Number']));
            if (empty($UpdateProfileModel->getUsername())) {
                $UpdateProfileModel->setUsernameErr('Please enter a name');
            }
            if (empty($UpdateProfileModel->getPassword())) {
                $UpdateProfileModel->setPasswordErr('Please enter a password');
            } elseif (strlen($UpdateProfileModel->getPassword()) < 4) {
                $UpdateProfileModel->setPasswordErr('Password must contain at least 4 characters');
            }
            if (empty($UpdateProfileModel->getAddress())) {
                $UpdateProfileModel->setAddressErr('Please enter your address');
            } 
            if (empty($UpdateProfileModel->getPhone_Number())) {
                $UpdateProfileModel->setPhone_NumberErr('Please enter a phone number');
            }
            if (empty($UpdateProfileModel->getBackup_Number())) {
                $UpdateProfileModel->setBackup_NumberErr('Please enter a backup phone number');
            }

            if (
                empty($UpdateProfileModel->getUsernameErr()) &&
                empty($UpdateProfileModel->getPasswordErr()) &&
                empty($UpdateProfileModel->getAddressErr()) &&
                empty($UpdateProfileModel->getPhone_NumberErr()) &&
                empty($UpdateProfileModel->getBackup_NumberErr())
            ){

                $rr = $UpdateProfileModel->updateProfile();
                if ($rr) {
                    flash('register_success', 'You have updated successfully');
                    redirect('users/Profile');
                } else {
                    die('Error in update');
                }
            }
            else{
                echo $EditProfileModel->getUsernameErr();
            }
        }
    }
    }
        $viewPath = VIEWS_PATH . 'users/editProfile.php';
        require_once $viewPath;
        $editProfileView = new editProfile($this->getModel(), $this);
        $editProfileView->output();
    }

    public function review()
    {
        $viewPath = VIEWS_PATH . 'users/Review.php';
        require_once $viewPath;
        $ReviewModel = $this->getModel();
        $view = new Review($ReviewModel, $this);
        $view->output();
    }
}