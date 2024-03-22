<!-- Maria Alfaro
mja65@njit.edu
3/1/24
It202-004
Phase02  -->
<?php
    $first_name=filter_input(INPUT_POST,"first_name");
    $last_name=filter_input(INPUT_POST,"last_name");
    $street_address=filter_input(INPUT_POST,"street_address");
    $city=filter_input(INPUT_POST,"city");
    $state=filter_input(INPUT_POST,"state");
    $zip_code=filter_input(INPUT_POST,"zip_code");
    $ship_date=filter_input(INPUT_POST,"ship_date");
    $order_number=filter_input(INPUT_POST,"order_number",FILTER_VALIDATE_INT);
    $package_dimension_l=filter_input(INPUT_POST,"package_dimension_l",FILTER_VALIDATE_INT);
    $package_dimension_w=filter_input(INPUT_POST,"package_dimension_w", FILTER_VALIDATE_INT);
    $package_dimension_h=filter_input(INPUT_POST,"package_dimension_h",FILTER_VALIDATE_INT);
    $declared_value=filter_input(INPUT_POST,"declared_value",FILTER_VALIDATE_FLOAT);

    $error_message='';

    //validate declared value 
    if($declared_value>=1000){
        $error_message.='Declared value must be less than $1,000<br>';
    }

    //validate package dimensions
    if ($package_dimension_l>=36 || $package_dimension_w>=36 ||$package_dimension_h>=36){
        $error_message.="Dimensions of package can't be more than 36 inches<br>";

    }

    //validate date
    if(empty($ship_date)){
        $error_message.="Enter a ship date <br>";

    }

    //validate state
    if(empty($state)){
        $error_message.="Enter a state <br>";
    }

    //validate zip code
    if (strlen($zip_code)!= 5 || !is_numeric($zip_code)){
        $error_message.="Enter valid ship zip code <br>";

    }

    if($error_message != '') {
        include('shipping.php');
        exit();
      }

    //formatting
    $format_value="$".$declared_value;
    $format_dimensions=$package_dimension_l.'" X '.$package_dimension_w.'" X '.$package_dimension_h.'"';
?>

<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="main.css">
        <title>Shipping</title>


        <title>Sip & Stir</title>
        <link rel="icon" href="images/tea-cup.png">

    </head>
    <body>

        <div>
        <header>
            <h1>Sip & Stir</h1>
            <nav class="mainNav">
                <a href="home.html">Home</a> |
                <a href="shipping.php">Shipping</a> |
                <a href="product.php">Products</a> |
                <a href="create.php">Create</a>
            </nav>
            <h2>Shipping Label</h2>
        </header>
        <main>
            <div class="shipping_label">
                <div id="frombox">
                    <h3 class="label_headers">From:</h3>
                    <ul class="shipping_label_ul">
                        <li>Sip & Stir</li>
                        <li>21 Brick Ave</li>
                        <li>Newark, NJ, 04894</li>
                    </ul>

                </div>
            
                <div id="tobox">
                    <h3 class="label_headers">To:</h3>
                    <ul class="shipping_label_ul">
                        <li><?php echo $first_name." ".$last_name; ?></li>
                        <li><?php echo $street_address; ?></li>
                        <li><?php echo $city.", ".$state." ".$zip_code; ?></li>
                    </ul>
                </div>

                <div id="box3">

                    <h3 class="label_headers">Package Dimensions: <?php echo $format_dimensions; ?> </h3>

                    <h3 class="label_headers">Package Declared Value: <?php echo $format_value; ?> </h3>

                    <h3 class="label_headers">Shipping Date: <?php echo $ship_date; ?> </h3>

                    <h3 class="label_headers">Shipping Campany: UPS</h3>

                    <h3 class="label_headers">Shipping Class: Next Day Air</h3>

                </div>
            
                <h3 class="middle" class="label_headers">Tracking Number: 47A585E860945</h3>

                <figure>
                    <img src="images\barcode.png" alt="barode">
                </figure>

                <h3 class="middle" class="label_headers">Order Number: <?php echo $order_number; ?></h3>

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