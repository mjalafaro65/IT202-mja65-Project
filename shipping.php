<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shipping Page</title>
</head>
<body>
    <h2>Shipping Details</h2>
    <form method="post" action="generate_label.php">
        <label for="first_name">First Name:</label>
        <input type="text" id="first_name" name="first_name" value="<?php echo htmlspecialchars($first_name); ?>">
        
        <label for="last_name">Last Name:</label>
        <input type="text" id="last_name" name="last_name" value="<?php echo htmlspecialchars($last_name); ?>"> 
        
        <label for="street_address">Street Address:</label>
        <input type="text" id="street_address" name="street_address" value="<?php echo htmlspecialchars($street_address); ?>"> 
        
        <label for="city">City:</label>
        <input type="text" id="city" name="city" value="<?php echo htmlspecialchars($city); ?>"> 
        
        <label for="state">State:</label>
        <input type="text" id="state" name="state" value="<?php echo htmlspecialchars($state); ?>"> 
        
        <label for="zip_code">Zip Code:</label>
        <input type="text" id="zip_code" name="zip_code" value="<?php echo htmlspecialchars($zip_code); ?>"> 
        
        <label for="ship_date">Ship Date:</label>
        <input type="date" id="ship_date" name="ship_date" value="<?php echo htmlspecialchars($ship_date); ?>"> 
        
        <label for="order_number">Order Number:</label>
        <input type="text" id="order_number" name="order_number" value="<?php echo htmlspecialchars($order_number); ?>"> 
        
        <label for="package_dimensions">Package Dimensions:</label>
        <input type="text" id="package_dimensions" name="package_dimensions" value="<?php echo htmlspecialchars($package_dimensions); ?>"> 
        
        <label for="declared_value">Declared Value:</label>
        <input type="text" id="declared_value" name="declared_value" value="<?php echo htmlspecialchars($declared_value); ?>"> 
        
        <input type="submit" value="Generate Packing Label">
    </form>
</body>
</html>
