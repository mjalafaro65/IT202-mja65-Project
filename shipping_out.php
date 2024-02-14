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

    if($error_message != '') {
        include('shipping.php');
        exit();
      }
?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        

        <title>Shipping</title>
        <link rel="stylesheet" href="main.css">



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
            <div>
                <label>From:</label>
                <ul>
                    <li>Sip & Stir</li>
                    <li>21 Brick Ave</li>
                    <li>Newark, NJ, 04894</li>
                </ul>

            </div>
            
            <div>
                <label>To:</label>
                <ul>
                    <li><?php $first_name." ".$last_name?></li>
                    <li><?php $street_address?></li>
                    <li><?php $city.", ".$state." ".$zip_code?></li>
                </ul>
            </div>


            <label>Package Dimensions:<?php $package_dimensions?> </label>

            <label>Shipping Company: <?php $ship_date?> </label>

            <label>Shipping Class: UPS</label>

            <label>Tracking Number: 47y58580945</label>

            <!-- An image of the tracking number barcode -->

            <label>Order Number <?php $order_number?></label>

        
            

            

        </main>
        <footer>

        </footer>
    </body>
</html>