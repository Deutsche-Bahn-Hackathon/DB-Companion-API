<?php
/**
 * Created by PhpStorm.
 * User: Moriz
 * Date: 12/15/2016
 * Time: 5:08 PM
 */

/**
 * @SWG\Definition(
 *   @SWG\Xml(name="Beacon")
 * )
 */
namespace api\model;


class Beacon {

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

    public function getMajor() {
        return $this->major;
    }

    public function getMinor() {
        return $this->minor;
    }

    public function getUuid() {
        return $this->uuid;
    }
}