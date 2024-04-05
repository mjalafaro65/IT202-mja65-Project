<!-- Maria Alfaro
3/29/24
It202-004
Phase03
mja65@njit.edu
-->


<?php

    session_start();

    $_SESSION = [];  

    session_destroy();  

    $login_message = 'You have been logged out.';

    include('login.php');

?>