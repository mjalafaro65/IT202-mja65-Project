<!-- Maria Alfaro
3/22/24
It202-004
Phase03
mja65@njit.edu
-->
<?php
    session_start();
    require_once('admin.php');

    if(isset($_SESSION['is_valid_admin']) && $_SESSION['is_valid_admin'] === true) {
        // if already logged, proceed to any page
    } else {
        // if not logged
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
            $password = $_POST['password'];

            // Validate login credentials
            if (is_valid_admin_login($email, $password)) {
                // Authentication successful
                $_SESSION['is_valid_admin'] = true;
                include('home.php');
            } else {
                  // Authentication failed-> error message
                if ($email == NULL && $password == NULL) {
                    $login_message ='Enter credentials';
        
                } else {
                    $login_message = 'Invalid credentials.';
                }
                include('login.php');              
            }
        }
    }


?>