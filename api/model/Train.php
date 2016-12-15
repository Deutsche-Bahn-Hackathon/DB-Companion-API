<?php
/**
 * Created by PhpStorm.
 * User: Moriz
 * Date: 12/15/2016
 * Time: 3:42 PM
 */

namespace api\model;

use JsonSerializable;


class Train implements JsonSerializable {
    private $id;

    function jsonSerialize() {
    }
}