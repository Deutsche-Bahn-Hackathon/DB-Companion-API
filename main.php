<?php

spl_autoload_register(function ($class) {
    /** @noinspection PhpIncludeInspection */
    require_once sprintf('%s/%s.php', $_SERVER['DOCUMENT_ROOT'], str_replace('\\', '/', $class));
});

date_default_timezone_set('Europe/Rome');

require_once __DIR__ . '/vendor/autoload.php';