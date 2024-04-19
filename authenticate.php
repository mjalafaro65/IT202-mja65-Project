<!-- Maria Alfaro
3/29/24
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
        $email = filter_input(INPUT_POST, 'email');
        $password = filter_input(INPUT_POST, 'password');

            // Validate login credentials
            if (is_valid_admin_login($email, $password)) {
                // Authentication successful
                $db = getDB();
                $queryCategory='SELECT firstName, lastName FROM sipStirManagers WHERE  emailAddress =:emailAddress';
                $statement1=$db->prepare($queryCategory);
                $statement1->bindValue(':emailAddress', $email);
                $statement1->execute();
                $column=$statement1->fetch();
                $firstName=$column['firstName'];
                $lastName=$column['lastName'];
                $statement1->closeCursor();


                $_SESSION['is_valid_admin'] = true;
                $_SESSION['email'] = $email;
                $_SESSION['firstName'] = $firstName;
                $_SESSION['lastName'] = $lastName;
                
                header("Location: home.php");

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


?>