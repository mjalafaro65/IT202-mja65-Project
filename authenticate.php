<!-- Maria Alfaro
3/22/24
It202-004
Phase03
mja65@njit.edu
-->
<?php

    require_once('admin.php');
    session_start();

    $email = filter_input(INPUT_POST, 'email');
    $password = filter_input(INPUT_POST, 'password');

    if (is_valid_admin_login($email, $password)) {
        //create an entry in the $_SESSION super global array
        $_SESSION['is_valid_admin'] = true;
        // redirect logged in user to default page
        echo "<p>You have successfully logged in.</p>";

//test for: email passsword 
    }else {
        if ($email == NULL && $password == NULL) {
            $login_message ='Enter credentials';

        } else {
            $login_message = 'Invalid credentials.';
        }

        include('login.php');

    }

?>