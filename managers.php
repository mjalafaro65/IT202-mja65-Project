<?php
    require_once('njit_database.php');
    
    function addSitStirManager($email, $password, $firstName, $lastName) {
        $db = getDB();
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $query = 'INSERT INTO sipStirManagers (emailAddress, password, firstName, lastName, dateCreated)
                  VALUES (:email, :password, :firstName , :lastName, NOW())';
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':password', $hash);
        $statement->bindValue(':firstName', $firstName);
        $statement->bindValue(':lastName', $lastName);
        $statement->execute();
        $statement->closeCursor();
        
    }

    addSitStirManager('mroberts@example.com','P@ssw0rd456','Jennifer', 'Smith');
    addSitStirManager('jsmith@example.com','Qwerty123!','Michael', 'Roberts');
    addSitStirManager('aadams@example.com','Sunshine789$','Amanda', 'Adams');



     
?>