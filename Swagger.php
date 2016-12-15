<?php

/**
 * Created by PhpStorm.
 * User: Moriz
 * Date: 12/15/2016
 * Time: 5:46 PM
 */
class Swagger {
    public static function get() {
        require("vendor/autoload.php");

        $exclude = array(
            "exclude" => "vendor",
        );

        $swagger = \Swagger\scan('.', $exclude);

        return $swagger;
    }
}