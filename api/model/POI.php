<?php

namespace api\model;

use JsonSerializable;

/**
 * @SWG\Definition(
 *   @SWG\Xml(name="POI")
 * )
 */
class POI implements JsonSerializable {

    /**
     * @SWG\Property(format="string")
     * @var string
     */
    private $address;

    /**
     * @SWG\Property(format="number")
     * @var double
     */
    private $lat;

    /**
     * @SWG\Property(format="number")
     * @var float
     */
    private $lon;

    /**
     * @SWG\Property(format="string")
     * @var string
     */
    private $photo_reference;

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
        $this->photo_reference = $photo;
        $this->url = $url;
        $this->website = $website;
    }

    function jsonSerialize() {
        return [
            'address' => $this->address,
            'lat' => $this->lat,
            'lon' => $this->lon,
            'photo_reference' => $this->photo_reference,
            'url' => $this->url,
            'website' => $this->website,
        ];
    }
}