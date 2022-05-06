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
                $registerModel->setNameErr('Please enter a name');
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
                $registerModel->setPassword(password_hash($registerModel->getPassword(), PASSWORD_DEFAULT));

                if ($registerModel->signup()) {
                    //header('location: ' . URLROOT . 'users/login');
                    flash('register_success', 'You have registered successfully');
                    redirect('users/login');
                } else {
                    die('Error in sign up');
                }
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
                $userModel->setPasswordErr('Please enter a password');
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
                if ($loggedUser) {

                    //create related session variables
                    $this->createUserSession($loggedUser);
                    die('Success log in User');
                    // redirect('public/public');
                    flash('login_success', 'You have logged in successfully');
                    // redirect('users/Register');
                    header('location: ' . URLROOT );
                } else {
                    $userModel->setPasswordErr('Password is not correct');
                }
            }
            else{
                echo $userModel->getUsernameErr() . $userModel->getPasswordErr();
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

    public function createUserSession($user)
    {
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_name'] = $user->name;
        header('location: ' . URLROOT . 'pages');
        // redirect('pages');
    }

    public function logout()
    {
        echo 'logout called';
        unset($_SESSION['user_id']);
        unset($_SESSION['user_name']);
        session_destroy();
        redirect('users/login');
    }

    public function isLoggedIn()
    {
        return isset($_SESSION['user_id']);
    }


    public function cart()
    {
		$viewPath = VIEWS_PATH . 'users/Cart.php';
        require_once $viewPath;
        $cartModel = $this->getModel();
        $view = new Cart($cartModel, $this);
        $view->output();
    }

    public function allmeals()
    {
        $viewPath = VIEWS_PATH . 'users/allmeals.php';
        require_once $viewPath;
        $allmealsView = new allmeals($this->getModel(), $this);
        $allmealsView->output();
    }

    public function MealsDetails()
    {
        $viewPath = VIEWS_PATH . 'users/MealsDetails.php';
        require_once $viewPath;
        $MealsDetailsView = new MealsDetails($this->getModel(), $this);
        $MealsDetailsView->output();
    }

    public function appetizers()
    {
        $viewPath = VIEWS_PATH . 'users/appetizers.php';
        require_once $viewPath;
        $appetizersView = new appetizers($this->getModel(), $this);
        $appetizersView->output();
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