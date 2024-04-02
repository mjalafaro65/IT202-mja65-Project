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

    $accessoryCategory_id= filter_input(INPUT_GET, 'accessoryCategory_id', FILTER_VALIDATE_INT);

    if( $accessoryCategory_id===Null || $accessoryCategory_id ===false){
        $accessoryCategory_id=1;
    }

    $queryCategory='SELECT * FROM accessoryCategories WHERE  accessoryCategoryID =:accessoryCategory_id';
    $statement1=$db->prepare($queryCategory);
    $statement1->bindValue(':accessoryCategory_id', $accessoryCategory_id);
    $statement1->execute();
    $category=$statement1->fetch();
    $category_name=$category['accessoryCategoryName'];
    $statement1->closeCursor();

    $queryAllCategories='SELECT * FROM accessoryCategories ORDER BY accessoryCategoryID';
    $statement2=$db->prepare($queryAllCategories);
    $statement2->execute();
    $categories= $statement2->fetchAll();
    $statement2->closeCursor();
    //     //debugging
    // echo "<pre>";
    // print_r($categories);
    // echo "</pre>";
    // echo "The category name is $category_name";


    $queryProducts='SELECT * FROM accessories WHERE  accessoryCategoryID=:accessoryCategory_id ORDER BY accessoryID';
    $statement3=$db->prepare($queryProducts);
    $statement3->bindValue(':accessoryCategory_id', $accessoryCategory_id);
    $statement3->execute();
    $accessories=$statement3->fetchAll();
    $statement3->closeCursor();
    


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
                
                echo '<a class="log"  href="login.php">log in</a>';
               }else{
                echo '| <a href="shipping.php">Shipping</a> |';
                echo '<a href="create.php">Create</a>';
                echo '<a class="log" href="logout.php">log out</a>';
               }

            ?>
        </nav>
        <h2>Product list</h2>
    </header>
    <main>
        
        <section>
            <h3 class="product_subheaders">Categories:</h2>
            <nav class="categories_li">
                <?php foreach($categories as $category): ?>
                <li>
                    <a href="?accessoryCategory_id=<?php echo $category['accessoryCategoryID'];?>"> <?php echo $category['accessoryCategoryName'];?></a>
                </li>
                <?php endforeach; ?>
            </nav>
        </section>
        <section>
            <h3 class="product_subheaders"><?php echo $category_name;?>:</h2>
            <table >
                <tr>
                    <th>Code</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Price</th>

                </tr>
                <?php foreach($accessories as $accessory):?>
                <tr>
                    <td><?php echo $accessory['accessoryCode'];?></td>
                    <td><?php echo $accessory['accessoryName'];?></td>
                    <td><?php echo $accessory['description'];?></td>
                <?php $priceFormatted="$".$accessory['price'];?>
                    <td><?php echo $priceFormatted?></td>
                </tr>
                <?php endforeach;?>
            </table>
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