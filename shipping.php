<?php
    $first_name = isset($first_name) ? $first_name : '';
    $last_name = isset($last_name) ? $last_name : '';
    $street_address = isset($street_address) ? $street_address : '';
    $city = isset($city) ? $city : '';
    $state = isset($state) ? $state : '';
    $zip_code = isset($zip_code) ? $zip_code : '';
    $ship_date = isset($ship_date) ? $ship_date : '';
    $order_number = isset($order_number) ? $order_number : '';
    $package_dimensions = isset($package_dimensions) ? $package_dimensions : '';
    $declared_value = isset($declared_value) ? $declared_value : '';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shipping Page</title>
    <link rel="stylesheet" href="main.css">
    <nav>
        <a href="home.html">Home</a> |
        <a href="shipping.php">Shipping</a>
    </nav>
</head>
<body>
    <h2>Shipping Details</h2>
    <form method="post" action="generate_label.php">
    
    <section>
        <div>
            <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name" value="<?php echo htmlspecialchars($first_name); ?>">
        </div>
        
        <div>
            <label for="last_name">Last Name:</label>
            <input type="text" id="last_name" name="last_name" value="<?php echo htmlspecialchars($last_name); ?>"> 
        </div>

        <div>
        <label for="street_address">Street Address:</label>
        <input type="text" name="street_address" value="<?php echo htmlspecialchars($street_address); ?>"> 
        </div>

        <div>
        <label for="city">City:</label>
        <input type="text" name="city" value="<?php echo htmlspecialchars($city); ?>"> 
        </div>

        <div>
        <label for="state">State:</label>
        <input type="text" name="state" value="<?php echo htmlspecialchars($state); ?>">     
        </div>

        <div>
        <label for="zip_code">Zip Code:</label>
        <input type="text" name="zip_code" value="<?php echo htmlspecialchars($zip_code); ?>"> 
        </div>

        <div id="ship_date">
        <label >Ship Date:</label>
        <input type="date"  name="ship_date" value="<?php echo htmlspecialchars($ship_date); ?>"> 
        </div>


        <div>
        <label>Order Number:</label>
        <input type="text" name="order_number" value="<?php echo htmlspecialchars($order_number); ?>"> 
        </div>

        <div>
        <label for="package_dimensions">Package Dimensions:</label>
        <input type="text"  name="package_dimensions" value="<?php echo htmlspecialchars($package_dimensions); ?>"> 
        </div>
        
        
        <div>
        <label for="declared_value">Declared Value:</label>
        <input type="text"  name="declared_value" value="<?php echo htmlspecialchars($declared_value); ?>"> 
        </div>

        <span class="button_container">
            <input type="submit" class="button" value="Generate Packing Label">
        </span>

        </section>
    
    </form>
</body>
</html>
