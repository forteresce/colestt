<?php
    /**
     * Parses the specified file and updates the names and values arrays.
     */
    function parseFile($fileName, &$names, &$values) {
        $handle = @fopen($fileName, "r");

        if ($handle) {
            while (($buffer = fgets($handle, 4096)) !== false) {
                $tokens = explode(", ", $buffer);
                array_push($names, $tokens[0]);
                $values[$tokens[0]] = $tokens[1]; 
            }

            if (!feof($handle)) {
                echo "Could not find EOF in file!";
            }

            fclose($handle);
        }
    }
?>
