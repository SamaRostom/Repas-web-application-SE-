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
        $_SESSION['ID_Type'] = $UserModel->ID_Type;
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
                        echo '<script>alert("Trip has been Removed...!")</script>';
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
        $CategoriesView->output();
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
            if (isset($_SESSION["cart"])){
                $item_array_id = array_column($_SESSION["cart"],"Meal_ID");
                if (!in_array($userModel->getMeal_ID(),$item_array_id)){
                    $count = count($_SESSION["cart"]);
                    $item_array = array(
                        'Meal_ID' => $userModel->getMeal_ID(),
                        'Meal_Name' => $userModel->getMeal_Name(),
                        'Meal_Price' => $userModel->getMeal_Price(),
                    );
                    $_SESSION["cart"][$count] = $item_array;
                }else{
                    // echo $_SESSION["cart"];
                    echo '<script>alert("Meal is already Added to Cart")</script>';
                }
            }else{
                $item_array = array(
                  'Meal_ID' => $userModel->getMeal_ID(),
                  'Meal_Name' => $userModel->getMeal_Name(),
                  'Meal_Price' => $userModel->getMeal_Price(),
                );
                $_SESSION["cart"][0] = $item_array;
            }
           
        }

        $viewPath = VIEWS_PATH . 'users/MealsDetails.php';
        require_once $viewPath;
        $MealsDetailsView = new MealsDetails($userModel, $this);
        $MealsDetailsView->output();

    }

    public function Meals()
    {
        $userModel = $this->getModel();
        //$_SESSION['Category_ID']=$_GET['id'];
        $userModel->setID_Category($_GET['ids']);
        $viewPath = VIEWS_PATH . 'users/Meals.php';
        require_once $viewPath;
        $MealsView = new Meals($this->getModel(), $this);
        $MealsView->output();
        
        // echo $_GET['id']; 
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