<?php
/**
 * Created by PhpStorm.
 * User: Moriz
 * Date: 12/15/2016
 * Time: 3:46 PM
 */

namespace api\model;

use JsonSerializable;

class Station implements JsonSerializable {

    /**
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    function jsonSerialize() {
        // TODO: Implement jsonSerialize() method.
    }
}