<?php
    include 'includes/functions.php';    
 
    $blade_names = array();
    $blade_values = array();

    $rubber_names = array();
    $rubber_values = array();

    parseFile("data/blades/wood_blades.txt", $blade_names, $blade_values);
    parseFile("data/blades/composite_blades.txt", $blade_names, $blade_values);
    parseFile("data/rubbers/inverted.txt", $rubber_names, $rubber_values);  
    parseFile("data/rubbers/pips_out.txt", $rubber_names, $rubber_values);  
?>
<html>
<body>
    <?php
        $blade= $_GET['blade'];
        $blade_handle = $_GET['blade_handle'];
        $blade_price = $blade_values[$blade];

        $black_rubber = $_GET['black_rubber'];
        $black_rubber_thickness = $_GET['black_rubber_thickness'];
        $black_rubber_price = $rubber_values[$black_rubber];

        $red_rubber = $_GET['red_rubber'];
        $red_rubber_thickness = $_GET['red_rubber_thickness'];
        $red_rubber_price = $rubber_values[$red_rubber];

        $price = intval($blade_price) + intval($black_rubber_price) + intval($red_rubber_price);

        $instructions= $_GET['instructions'];

        echo "Blade: $blade ($blade_handle) - \$$blade_price<br />";
        echo "Black Rubber: $black_rubber ($black_rubber_thickness) - \$$black_rubber_price<br />";
        echo "Red Rubber: $red_rubber ($red_rubber_thickness) - \$$red_rubber_price<br />";
        echo "<b>Total: \$$price</b><br />"; 
        echo "Extra Instructions: $instructions<br />";
    ?>

    <form target="paypal" action="https://www.paypal.com/cgi-bin/webscr" method="post">
        <input type="image" src="https://www.paypal.com/en_US/i/btn/x-click-but22.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
        <img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
        <input type="hidden" name="add" value="1">
        <input type="hidden" name="cmd" value="_cart">
        <input type="hidden" name="business" value="cole.ely@gmail.com">
        <input type="hidden" name="item_name" value="Blade + Rubbers Combo">
        <input type="hidden" name="amount" value="<?php echo $price;?>">
        <input type="hidden" name="no_shipping" value="2">
        <input type="hidden" name="no_note" value="1">
        <input type="hidden" name="currency_code" value="USD">
        <input type="hidden" name="bn" value="PP-ShopCartBF">
        <input type="hidden" name="on0" value="Blade">
        <input type="hidden" name="os0" value="<?php echo $blade;?>">
        <input type="hidden" name="on1" value="Blade Handle">
        <input type="hidden" name="os1" value="<?php echo $blade_handle;?>">
        <input type="hidden" name="on2" value="Black Rubber">
        <input type="hidden" name="os2" value="<?php echo $black_rubber;?>">
        <input type="hidden" name="on3" value="Black Rubber Thickness">
        <input type="hidden" name="os3" value="<?php echo $black_rubber_thickness;?>">
        <input type="hidden" name="on4" value="Red Rubber">
        <input type="hidden" name="os4" value="<?php echo $red_rubber;?>">
        <input type="hidden" name="on5" value="Red Rubber Thickness">
        <input type="hidden" name="os5" value="<?php echo $red_rubber_thickness;?>">
        <input type="hidden" name="on6" value="Extra Instructions">
        <input type="hidden" name="os6" value="<?php echo $instructions;?>">
    </form>
</body>
</html>
