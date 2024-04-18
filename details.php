
<?php
    require_once('njit_database.php');
    $db = getDB();
    
    if(isset($_GET['accessoryID'])) {
        // Sanitize the input to prevent SQL injection using prepared statements
        $product_id = $_GET['accessoryID'];
        
    }

    $query = 'SELECT * FROM accessories WHERE accessoryID = :accessoryID';
    $statement1=$db->prepare($query);
    $statement1->bindValue('accessoryID', $product_id);
    $statement1->execute();
    $productDetails=$statement1->fetch(PDO::FETCH_ASSOC);
    $statement1->closeCursor();

    


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">

    <title>Sip & Stir</title>
    <link rel="icon" href="images/tea-cup.png">
    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
    <script src="delete.js"></script>

</head>

<body>
<header>
        <h1>Sip & Stir</h1>
        <?php
        //welcome message

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
               if(!isset($_SESSION['is_valid_admin'])){
                
                echo '<a class="log"  href="login.php">log in</a>';
               }else{
                echo '| <a href="shipping.php">Shipping</a> |';
                echo '<a href="create.php">Create</a>';
                echo '<a class="log" href="logout.php">log out</a>';
               }

            ?>
        </nav>
  
        <h2 ><?php echo $productDetails['accessoryName']?></h2>

        
     
        



    </header>
    <main>
        <?php
            if(count($productDetails)===0){
                echo "<br>";
                echo "<p>Error: Accessory doesn't not exist<p>";
                echo "<br>";
                echo "<a href='product.php'>Go to Product List</a>";
            }  
            
            
            foreach ($productDetails as $key => $value) {
                echo "$key: $value<br>";
            }
        ?>

        

        <!-- <p>Accessory Name: <?php echo $productDetails['accessoryName']?></p>
        <p>Accessory Code: <?php echo $productDetails['accessoryCode']?></p>
        <p>Accessory Code: <?php echo $productDetails['accessoryCode']?></p> -->


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