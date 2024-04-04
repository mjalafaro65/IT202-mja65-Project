<?php
    require_once('njit_database.php');
    $db=getDB();
    
    $accessory_id=filter_input(INPUT_POST, 'accessory_id', FILTER_VALIDATE_INT);
    $category_id=filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);

    if($accessory_id != false && $category_id != false){
        $query= 'DELETE FROM accessories WHERE accessoryID =:accessory_id';
        $statement=$db->prepare($query); //statement is pdo object
        $statement->bindValue(':accessory_id', $accessory_id); //find product id that matches product if in form
        $success= $statement->execute();
        $statement->closeCursor();
        include('product.php');

    }else{
        echo "error";
    }
?>
