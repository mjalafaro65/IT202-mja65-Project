<!-- Maria Alfaro
3/22/24
It202-004
Phase03
mja65@njit.edu
-->

<?php
    if( !isset($price)) { $price = ''; }
    if( !isset($code)) { $code = ''; }
    if( !isset($description)) { $description = ''; }
    if( !isset($name)) { $name = ''; }
    

    require_once('njit_database.php');

    $query = 'SELECT *FROM accessoryCategories ORDER BY accessoryCategoryID';
    $statement = $db->prepare($query);
    $statement->execute();
    $categories = $statement->fetchAll();
    $statement->closeCursor();

?>

<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">

    <title>Sip & Stir</title>
    <link rel="icon" href="images/tea-cup.png">
</head>

<!-- the body section -->
<body>
    <header>
        <h1>Sip & Stir</h1>
        <nav class="mainNav">
            <a href="home.html">Home</a> |
            <a href="shipping.php">Shipping</a> |
            <a href="product.php">Products</a> |
            <a href="create.php">Create</a>
        </nav>
        <h2>Add Products</h2>
    </header>

    <main>
        <?php
            if(!empty($error)){
                echo "<p>";
                echo "Error: <br>".$error;
                echo "</p>";
            }
        ?>
        <form action="create_validation.php" method="post">
            <section>
                <div>
                    <label>Category:</label>
                    <select class="box" name="accessoryCategory_id">
                    <?php foreach ($categories as $category) : ?>
                        <option value="<?php echo $category['accessoryCategoryID']; ?>">
                            <?php echo $category['accessoryCategoryName']; ?>
                        </option>
                    <?php endforeach; ?>
                    </select>
                </div>
                

                <div>
                    <label>Code:</label>
                    <input class="box" type="text" name="code" value="<?php echo htmlspecialchars($code);?>">
                </div>
                
                <div>
                    <label>Name:</label>
                    <input class="box" type="text" name="name" value="<?php echo htmlspecialchars($name);?>">
                </div>

                <div>
                    <label>Description:</label>
                    <textarea class="box" type="text" name="description" value="<?php echo htmlspecialchars($description);?>"></textarea>
                </div>
                
                <div>
                    <label>List Price:</label>
                    <input class="box" type="text" name="price"  value='<?php echo htmlspecialchars($price);?>'>
                </div>
                
                <span >
                    <input class="button"  type="submit" value="Add Product"><br>
                    </span>

                
            </section>

            
        </form>
        <p><a href="product.php">View Product List</a></p>
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

