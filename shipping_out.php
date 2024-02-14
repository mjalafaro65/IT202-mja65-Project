<?php
    $first_name=filter_input(INPUT_POST,"first-name");
    $last_name=filter_input(INPUT_POST,"last_name");
    $street_adress=filter_input(INPUT_POST,"street_adress");
    $city=filter_input(INPUT_POST,"city");
    $state=filter_input(INPUT_POST,"state");
    $zip_code=filter_input(INPUT_POST,"zip_code");
    $ship_date=filter_input(INPUT_POST,"ship_date");
    $order_number=filter_input(INPUT_POST,"order_number",FILTER_VALIDATE_INT);
    $package_dimensions=filter_input(INPUT_POST,"package_dimensions");
    $declared_value=filter_input(INPUT_POST,"declared_value",FILTER_VALIDATE_FLOAT);

    $error_message='';

    //validate declared value 
    if($declared_value>=1000){
        $error_message.='Declared value must be less than $1, 000<br>';
    }

    //validate package dimensions
    if ($package_dimensions>=36){
        $error_message.="No dimension of package can be more then 36 inches<br>";

    }

    //validate zip code
    if (strlen((string)$zip_code)!=4 && !is_numeric($zip_code)){
        $error_message.="Enter a valid zipcode <br>";

    }
?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        

        <title>Shipping</title>

    </head>
    <body>
        <header>
            <h1>Sip & Stir</h1>
            <nav>
                <!--reoload this page-->
                <a href="home.html">Home</a>| 
                <!--go to shippping page-->
                <a href="shipping.php">Shipping</a>
            </nav>
        </header>
        <main>
            <label>From:</label>

            <label>To:</label>

            <label>package_dimensions:</label>

            <label>package_dimensions:</label>

            

        </main>
        <footer>

        </footer>
    </body>
</html>