<?php

    function addSitStirManager($email, $password, $firstName, $lastName, $dateCreated) {
        $db = getDB();
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $query = 'INSERT INTO SipStirManagers (emailAddress, password, firstName, lastName, dateCreated)
                  VALUES (:email, :password, :firstName , :lastName, NOW())';
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':password', $hash);
        $statement->bindValue(':firstName', $firstName);
        $statement->bindValue(':lastName', $lastName);
        $statement->execute();
        $statement->closeCursor();
     }
?>