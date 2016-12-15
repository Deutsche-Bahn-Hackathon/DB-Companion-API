<?php
/**
 * Created by PhpStorm.
 * User: Moriz
 * Date: 12/15/2016
 * Time: 5:01 PM
 */

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