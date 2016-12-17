<?php

namespace api\endpoint;

use Interop\Container\ContainerInterface;
use Slim\Http\Request;
use Slim\Http\Response;
use util\Fcm;

class Departure {
    private $containerInterface;

    public function __construct(ContainerInterface $containerInterface) {
        $this->containerInterface = $containerInterface;
    }

    public static function update(Request $request, Response $response, array $args) {
        Fcm::send('ice1206', 'notification', [
            'id' => $_POST['id'],
            'audience' => 'all',
            'package' => 'com.dbhackathon',
            'issuedAt' => time(),
            'expiry' => time() + 3600 ,
            'titleIt' => 'Train delayed by 10 mins',
            'titleDe' => 'Train delayed by 10 mins',
            'messageIt' => 'Your train will depart on platform 3',
            'messageDe' => 'Your train will depart on platform 3',
            'minVersion' => 0,
            'maxVersion' => 0,
            'color' => 'f44336',
            'dialogTitleIt' => 'Train delayed by 10 mins',
            'dialogTitleDe' => 'Train delayed by 10 mins',
            'dialogTextIt' => 'Your train will depart on platform 3',
            'dialogTextDe' => 'Your train will depart on platform 3',
            'dialogNoIt' => 'OK',
            'dialogNoDe' => 'OK'
        ]);
    }
}