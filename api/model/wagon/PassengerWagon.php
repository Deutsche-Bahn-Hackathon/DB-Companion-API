<?php

namespace api\model;

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

}