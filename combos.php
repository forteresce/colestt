<?php
    include 'includes/functions.php';

    $wood_blade_names = array();
    $composite_blade_names = array();
    $rubber_names = array();
    $blade_values = array();

    $inverted_rubber_names = array();
    $pips_out_rubber_names = array();
    $rubber_values = array();

    $blade_data = parseFile("data/blades/wood_blades.txt", $wood_blade_names, $blade_values);
    $blade_data = parseFile("data/blades/composite_blades.txt", $composite_blade_names, $blade_values);
    $rubber_data = parseFile("data/rubbers/inverted.txt", $inverted_rubber_names, $rubber_values);
    $rubber_data = parseFile("data/rubbers/pips_out.txt", $pips_out_rubber_names, $rubber_values);
?>
<html>
<head>
    <?php include 'includes/head.php'?>
</head>
<body>
    <?php include 'includes/header.php'?>
    <?php include 'includes/leftpane.php'?>

    <div id="body">
    <h1>Combo Builder</h1>
    
    <p> 
        By default, combos come assembled with rubbers (many at discount), case, tape, ready to play.
    </p>
    <p>
        Please check the rubber and blade pages for availability before ordering.
    </p>

    <form action="combo_confirmation.php" method="get" target="frame">
        <table>
            <tr>
                <td>
                    Blade
                </td>
                <td>
                    <select name="blade">
                        <optgroup label="Wood Blades">
                            <?php
                                foreach ($wood_blade_names as &$name) {
                                    echo "<option value=\"$name\">$name - \$$blade_values[$name]</option>" ;
                                }
                            ?>
                        </optgroup>
                        <optgroup label="Composite Blades">
                            <?php
                                foreach ($composite_blade_names as &$name) {
                                    echo "<option value=\"$name\">$name - \$$blade_values[$name]</option>" ;
                                }
                            ?>
                        </optgroup>
                    </select> 
                </td>
                <td>
                    Handle
                </td>
                <td>
                    <select name="blade_handle">
                        <option value="Flared">Flared</option>
                        <option value="Straight">Straight</option>
                        <option value="Anatomic">Anatomic</option>
                        <option value="Cpen">Cpen</option>
                        <option value="Jpen">Jpen</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    Black Rubber
                </td>
                <td>
                    <select name="black_rubber">
                        <optgroup label="Inverted">
                            <?php
                                foreach ($inverted_rubber_names as &$name) {
                                    echo "<option value=\"$name\">$name - \$$rubber_values[$name]</option>" ;
                                }
                            ?>
                        </optgroup>
                        <optgroup label="Pips Out">
                            <?php
                                foreach ($pips_out_rubber_names as &$name) {
                                    echo "<option value=\"$name\">$name - \$$rubber_values[$name]</option>" ;
                                }
                            ?>
                        </optgroup>
                    </select> 
                </td>
                <td>
                    Thickness
                </td>
                <td>
                    <input type="text" name="black_rubber_thickness" size="4" maxlength="20" required="required">
                </td>
            </tr>
            <tr>
                <td>
                    Red Rubber
                </td>
                <td>
                    <select name="red_rubber">
                        <optgroup label="Inverted">
                            <?php
                                foreach ($inverted_rubber_names as &$name) {
                                    echo "<option value=\"$name\">$name - \$$rubber_values[$name]</option>" ;
                                }
                            ?>
                        </optgroup>
                        <optgroup label="Pips Out">
                            <?php
                                foreach ($pips_out_rubber_names as &$name) {
                                    echo "<option value=\"$name\">$name - \$$rubber_values[$name]</option>" ;
                                }
                            ?>
                        </optgroup>
                    </select> 
                </td>
                <td>
                    Thickness
                </td>
                <td>
                    <input type="text" name="red_rubber_thickness" size="4" maxlength="20" required="required">
                </td>
            </tr>
            <tr>
                <td>
                    Extra Instructions
                </td>
                <td>
                    <input type="text" name="instructions" size="50" maxlength="200">
                    <br />
                    e.g. Penhold Gap, Blade Sealing, etc.
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" value="Build Combo">
                </td>
            </tr>
        </table> 
    </form>

    <iframe name="frame" id="frame" width="500" height="180"></iframe>
    </div>
</body>
</html>
