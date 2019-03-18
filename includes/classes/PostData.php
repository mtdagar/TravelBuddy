<?php
    $routeCoordinates = $_POST['array'];
    $encodedString = serialize($routeCoordinates);
    echo $encodedString;
 ?>
