<!-- Maria Alfaro
3/22/24
It202-004
Phase03
mja65@njit.edu
-->
<?php 
    
    require_once('authenticate.php');
    require_once('njit_database.php');
    $db = getDB(); 

    $accessoryCategory_id=filter_input(INPUT_POST, 'accessoryCategory_id', FILTER_VALIDATE_INT);
    $code=filter_input(INPUT_POST,'code');
    $name=filter_input(INPUT_POST,'name');
    $description=filter_input(INPUT_POST,'description');
    $price=filter_input(INPUT_POST, 'price');


    //validate inputs
    $error='';
    if($accessoryCategory_id == NULL || $accessoryCategory_id==FALSE ||$code==NULL || $name==NULL || $name==FALSE ||$description==NULL ||$price==NULL  ){
        $error.="Invalid product data. Check all fields and try again <br>";
        
    }
    if($price==FALSE){
        $error.="Price must be in decimal form <br>";

    }

    if($price>350 || $price<0){
        $error.="Product price can't exceed $350 <br>";
    }

    
    //get array of codes
    $queryCode='SELECT * FROM accessories WHERE accessoryCode=:code';
    $statement=$db->prepare($queryCode);
    $statement->bindValue(':code', $code);
    $statement->execute();
    $codeD=$statement->fetch();
    $statement->closeCursor();
    
    if($codeD){
        $code='';
        $error.="Enter unique code";
    }
    

    if($error != '') {
        include('create.php');
        exit();
    }
        
    
    


    //add product to database
    $inStock='yes';
    $query='INSERT INTO accessories(accessoryCategoryID, accessoryCode, accessoryName, description, inStock, price, dateCreated)
        VALUES
        (:accessoryCategory_id, :code, :name , :description, :inStock, :price, NOW())';
    $statement=$db->prepare($query);
    $statement->bindValue(':accessoryCategory_id', $accessoryCategory_id);
    $statement->bindValue(':code', $code);
    $statement->bindValue(':name', $name);
    $statement->bindValue(':inStock', $inStock);
    $statement->bindValue(':description', $description);
    $statement->bindValue(':price', $price);
    $success=$statement->execute();
    $statement->closeCursor();

    $success_message="<p>Success you have entered  $success product </p>";

    
       

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
               if(!isset($_SESSION['is_valid_admin'])){
                
                echo '<a class="log"  href="login.php">log in</a>';
               }else{
                echo '| <a href="shipping.php">Shipping</a> |';
                echo '<a href="create.php">Create</a> |';
                echo '<a class="log" href="logout.php">log out</a>';
               }

            ?>
        </nav>
        <h2>Product list</h2>
    </header>
    <main>
        
        <?php
            echo "<br>";
            echo $success_message;
         ?>
        
        <p><a href="product.php">View product List</a></p>
        <p><a href="create.php">Add Another</a></p>


       

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

