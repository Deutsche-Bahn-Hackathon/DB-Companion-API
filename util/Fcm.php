<?php

namespace util;

const API_KEY = 'AIzaSyADu1C07_reKfzioYRZ7is4g69_fO2pujc';

class Fcm {

    public static function send($topic, $receiver, $content) {
        syslog(LOG_DEBUG, file_get_contents('https://fcm.googleapis.com/fcm/send', false, stream_context_create($data = [
            'http' => [
                'header' => 'Content-Type: application/json' . "\r\n" .
                    'Authorization: key=' . API_KEY . "\r\n",
                'method' => 'POST',
                'content' => json_encode([
                    'to' => '/topics/' . $topic,
                    'data' => [
                        'receiver' => $receiver,
                        'content' => $content
                    ]
                ])
            ]
        ])));
    }
}