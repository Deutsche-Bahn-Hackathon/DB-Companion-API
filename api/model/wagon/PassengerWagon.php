<?php

namespace api\model\wagon;

/**
 * @SWG\Definition(
 *   @SWG\Xml(name="Passenger Wagon")
 * )
 */
class PassengerWagon extends Wagon {

    /**
     * @SWG\Property(format="int32")
     * @var int
     */
    private $seats;

    /**
     * @SWG\Property(format="int32")
     * @var int
     */
    private $taken_seats;

    function jsonSerialize() {
        return [
            parent::jsonSerialize(),
            'seats' => $this->seats,
            'taken_seats' => $this->taken_seats];
    }
}