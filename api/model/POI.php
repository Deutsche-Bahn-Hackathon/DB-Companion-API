<?php
/**
 * Created by PhpStorm.
 * User: Moriz
 * Date: 12/17/2016
 * Time: 12:26 PM
 */

namespace api\model;

use JsonSerializable;

/**
 * @SWG\Definition(
 *   @SWG\Xml(name="POI")
 * )
 */
class POI implements \JsonSerializable {
    /**
     * @SWG\Property(format="string")
     * @var string
     */
    private $address;
    /**
     * @SWG\Property(format="string")
     * @var string
     */
    private $lat;

    /**
     * @SWG\Property(format="string")
     * @var string
     */
    private $lon;

    /**
     * @SWG\Property(format="string")
     * @var string
     */
    private $photo;

    /**
     * @SWG\Property(format="string")
     * @var string
     */
    private $url;

    /**
     * @SWG\Property(format="string")
     * @var string
     */
    private $website;


    public function __construct($address, $lat, $lon, $photo, $url, $website) {
        $this->address = $address;
        $this->lat = $lat;
        $this->lon = $lon;
        $this->photo = $photo;
        $this->url = $url;
        $this->website = $website;
    }

    function jsonSerialize() {
        return [
            'address' => $this->address,
            'lat' => $this->lat,
            'lon' => $this->lon,
            'photo' => $this->photo,
            'url' => $this->url,
            'website' => $this->website,
        ];
    }


}