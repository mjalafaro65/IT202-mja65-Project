<!-- Maria Alfaro
3/22/24
It202-004
Phase03
mja65@njit.edu
-->



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
        <?php
            if(!isset($_SESSION)){
                session_start();
            }
            
            if(isset($_SESSION['is_valid_admin']) && $_SESSION['is_valid_admin']){
                $email=$_SESSION['email'];
                $firstName=$_SESSION['firstName'];
                $lastName=$_SESSION['lastName'];
                echo "<h2 id='welcome_message'> Welcome $firstName $lastName ($email)</h2>";
            }

           

 
        ?>
        <nav class="mainNav">
            <a href="home.php">Home</a> |
            <a href="product.php">Products</a> 

            <?php
                

               if(isset($_SESSION['is_valid_admin']) && $_SESSION['is_valid_admin']){
                echo '| <a href="shipping.php">Shipping</a> |';
                echo '<a href="create.php">Create</a>' ;
                echo '<a class="log" href="logout.php">log out</a>';
                
               }else{
                echo '<a class="log" href="login.php">log in</a>';
               }

            ?>
        </nav>
    </header>
    <main >
        <p id="home_p">Welcome to Sip and Stir. Sip and Stir is your go-to destination for all things coffee and tea. Since our opening, we've been dedicated to providing you with the finest brewing essentials. If you're in the mood for a cup of coffee from our electric kettles or a soothing pot of teas brewed with our quality French presses, we've got you covered. Our collection also includes must-haves like tea infuser sets, coffee grinders, and cold brew coffee makers. At Sip and Stir, our mission is to make every sip and stir a moment of joy.</p>

    <div class="image_container">

        <figure>
            <img class="home_img" src="images\brew.webp" alt="brew">
            <caption>Cold Brew Coffee Maker</caption>
        </figure>
       
        <figure>
            <img class="home_img" src="images\fpress.jpg" alt="french press">
            <caption>French Press</caption>
        </figure>
        
        <figure>
            <img  class="home_img" src="images\kettle.jpg" alt="kettle">
            <caption>Electric Kettle</caption>
        </figure>

        <figure>
            <img  class="home_img" src="images\tea.webp" alt="tea infuser">
            <caption class="cap">Tea Infuser</caption>
        </figure>
       
    </div>
       
  
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