<!-- Maria Alfaro
3/29/24
It202-004
Phase03
mja65@njit.edu
-->

<?php 
if (!isset($login_message)) {
    $login_message = "";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">

    <title>Sip & Stir</title>
    <link rel="icon" href="images/tea-cup.png">

</head>
<body>
    <header>
        <h1>Sip & Stir</h1>
        <nav class="mainNav">
            <a href="home.php">Home</a> |
            <a href="product.php">Products</a> 

            <?php
               if(!isset($_SESSION['is_valid_admin'])){
                
                echo '<a class="log" href="login.php">log in</a>';
               }else{
                echo '| <a href="shipping.php">Shipping</a> |';
                echo '<a href="create.php">Create</a> |';
                echo '<a class="log" href="logout.php">log out</a>';
               }

            ?>
        </nav>
        <h2>log in</h2>
    </header>
    <main>
        <section>
            <form action="authenticate.php" method="post">
                    <label>Email:</label>
                    <input type="text" name="email" value="">
                    <br>
                    <label>Password:</label>
                    <input type="password" name="password" value="">
                    <br>
                    <input type="submit" value="Login">
            </form>
                <p><?php echo $login_message; ?></p>
        </section>
            
  
    </main>
    <footer>
        <h1>Sip and Stir</h1>
        <address>
            Sip & Stir<br>
            21 Brick Ave<br>
            Newark, NJ, 04894<br>
        </address>
        <h5>@ Sip and Stir, 2024</h5>
        
    </footer>

</body>

</html>

