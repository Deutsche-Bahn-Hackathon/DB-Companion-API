<?php

namespace api\model;

use JsonSerializable;


/**
 * @SWG\Definition(
 *   @SWG\Xml(name="Beacon")
 * )
 */
class Beacon implements JsonSerializable {

    /**
     * @SWG\Property(format="string")
     * @var string
     */
    private $uuid;

    /**
     * @SWG\Property(format="int32")
     * @var int
     */
    private $major;

    /**
     * @SWG\Property(format="int32")
     * @var int
     */
    private $minor;

    public function __construct($uuid, $major, $minor) {
        $this->uuid = $uuid;
        $this->major = $major;
        $this->minor = $minor;
    }

    function jsonSerialize() {
        return [
            'uuid' => $this->uuid,
            'major' => $this->major,
            'minor' => $this->minor
        ];
    }
}