<?php

namespace api\model;

use JsonSerializable;

/**
 * @SWG\Definition(
 *   @SWG\Xml(name="Station")
 * )
 */
class Station implements JsonSerializable {

    /**
     * @SWG\Property(format="int32")
     * @var int
     */
    private $id;

    /**
     * @SWG\Property(format="string")
     * @var string
     */
    private $state;

    /**
     * @SWG\Property(format="string")
     * @var string
     */
    private $name;

    /**
     * @SWG\Property(format="string")
     * @var string
     */
    private $street;

    /**
     * @SWG\Property(format="int32")
     * @var int
     */
    private $postal_code;

    /**
     * @SWG\Property(format="string")
     * @var string
     */
    private $city;

    /**
     * Station constructor.
     * @param int $id
     * @param string $state
     * @param string $name
     * @param string $street
     * @param int $postal_code
     * @param string $city
     */
    public function __construct($id, $state, $name, $street, $postal_code, $city) {
        $this->id = $id;
        $this->state = $state;
        $this->name = $name;
        $this->street = $street;
        $this->postal_code = $postal_code;
        $this->city = $city;
    }

    function jsonSerialize() {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'state' => $this->state,
            'street' => $this->street,
            'postal_code' => $this->postal_code,
            'city' => $this->city
        ];
    }

    /**
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getState() {
        return $this->state;
    }

    /**
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getStreet() {
        return $this->street;
    }

    /**
     * @return int
     */
    public function getPostalCode() {
        return $this->postal_code;
    }

    /**
     * @return string
     */
    public function getCity() {
        return $this->city;
    }
}