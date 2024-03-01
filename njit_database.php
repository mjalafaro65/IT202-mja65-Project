
<?php
    $dsn = 'mysql:host=sql1.njit.edu;port=3306;dbname=mja65';
    $username = 'mja65';
    $password = '$Mario2005$';
    try {
        $db = new PDO($dsn, $username, $password);
        // echo '<p>You are connected to the local database!</p>';
    } catch(PDOException $ex) {
        $error_message = $ex->getMessage();
        include("database_error.php");
        exit();
    }
?>