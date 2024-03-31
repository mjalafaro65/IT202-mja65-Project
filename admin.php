<!-- Maria Alfaro
3/22/24
It202-004
Phase03
mja65@njit.edu
-->

<?php
    require_once('njit_database.php');
    function is_valid_admin_login($email, $password) {
        $db = getDB();
        $query = 'SELECT password FROM sipStirManagers WHERE emailAddress = :email';
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->execute();
        $row = $statement->fetch();
        $statement->closeCursor();  

        if ($row === false) {
            return false;
        } else {
            $hash = $row['password'];
            return password_verify($password, $hash);

        }

    }
?>