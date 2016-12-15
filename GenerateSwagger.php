<?php
/**
 * Created by PhpStorm.
 * User: Moriz
 * Date: 12/15/2016
 * Time: 4:19 PM
 */

require("vendor/autoload.php");

$exclude = array(
    "exclude" => "vendor",
);

$swagger = \Swagger\scan('.', $exclude);
header('Content-Type: application/json');
echo $swagger;