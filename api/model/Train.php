<?php
/**
 * Created by PhpStorm.
 * User: Moriz
 * Date: 12/15/2016
 * Time: 3:42 PM
 */

namespace api\model;

use JsonSerializable;

/**
 * @SWG\Definition(
 *   @SWG\Xml(name="Train")
 * )
 */
class Train implements JsonSerializable {

    /**
     * @SWG\Property(format="string")
     * @var string
     */
    private $id;

    function jsonSerialize() {
    }
}