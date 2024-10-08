<!-- Maria Alfaro
4/19/24
It202-004
Phase03
mja65@njit.edu
-->

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

        <?php if(!$productDetails===false){?>
  
            <h2 ><?php echo $productDetails['accessoryName']?></h2>

        <?php }
        ?>

    </header>
    <main id="details_main">
       
        <?php if(!$productDetails===false){?>
        
         <table >
            <td>Accessory Name: <?php echo $productDetails['accessoryName']?></td>
            <td>Accessory Price: <?php echo $productDetails['price']?></td>
            <td>Accessory Description: <?php echo $productDetails['description']?></td>

                <td>Accessory Code: <?php echo $productDetails['accessoryCode']?></td>
                <td>Accessory ID: <?php echo $productDetails['accessoryID']?></td>
                <td>Accessory Category ID: <?php echo $productDetails['accessoryCategoryID']?></td>
                
                <td>Accessory in stock: <?php echo $productDetails['inStock']?></td>
                
                <td>Accessory Date Created: <?php echo $productDetails['dateCreated']?></td>

            </table>
            <div id="details_img_container">
                <img id="detail_img" src="images\<?php echo $productDetails['accessoryID']?>.jpg" alt="Accessory image" >
            </div>

        <?php      
            }else{  

                echo "<br>";
                echo "<p>Error: Accessory doesn't not exist<p>";
                echo "<br>";
                echo "<a href='product.php'>Go to Product List</a>";
            }
        ?>
        
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