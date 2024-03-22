 <!-- Maria Alfaro
mja65@njit.edu
3/1/24
It202-004
Phase02  -->
<?php  
    require_once('njit_database.php');

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
        $error.="Price must be in decimal form";

    }

    if($price>350){
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

    echo"<p>Your insert statement status is $success</p>";
    
       

?>

<p><a href="product.php">View product List</a></p>
