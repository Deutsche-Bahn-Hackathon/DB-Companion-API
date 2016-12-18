<?php

namespace api\model\wagon;

/**
 * @SWG\Definition(
 *   @SWG\Xml(name="Diner Wagon")
 * )
 */
class DinerWagon extends Wagon {
    function jsonSerialize() {
        return [
            parent::jsonSerialize()
        ];
    }
}