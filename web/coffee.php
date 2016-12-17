<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    syslog(LOG_DEBUG, 'Topic: /topics/' . $_POST['train']);
    syslog(LOG_DEBUG, file_get_contents('https://fcm.googleapis.com/fcm/send', false, stream_context_create($data = [
        'http' => [
            'header' => 'Content-Type: application/json' . "\r\n" .
                'Authorization: key=AIzaSyCqsYMvGgUK4bnG8BoXSh70D2znH2IxOLM' . "\r\n",
            'method' => 'POST',
            'content' => json_encode([
                'to' => '/topics/' . $_POST['train'],
                'data' => [
                    'receiver' => 'coffee',
                    'content' => [
                        [
                            'id' => 'e504ac74-a94e-4711-b639-9bafda9ce110',
                            'name' => 'Espresso',
                            'price' => 1.2

                        ],
                        [
                            'id' => 'e0957b04-cd9f-4c8c-b429-c5fa0d1ccfa7',
                            'name' => 'Macchiato',
                            'price' => 1.2
                        ],
                        [
                            'id' => 'dadc9579-c352-48cd-bf85-df97970bea4d',
                            'name' => 'Cappuccino',
                            'price' => 1.5
                        ]
                    ]
                ]
            ])
        ]
    ])));

    die;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="SasaBus: Reset password">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">

    <title>Coffee</title>

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <!--<link rel="icon" sizes="192x192" href="/static/images/">-->

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Coffee">
    <link rel="apple-touch-icon-precomposed" href="/static/">

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
    <meta name="msapplication-TileColor" content="#3372DF">

    <!--<link rel="shortcut icon" href="/static/images/">-->

    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link type="text/css" rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.min.css">
    <link type="text/css" rel="stylesheet" href="/static/css/material.css">

    <style>
        body {
            background: #f5f5f5;
        }

        a {
            font-weight: bold;
            text-decoration: none;
            color: #3f51b5;
        }

        .demo-ribbon {
            background-color: #f44336;
        }

        *:focus {
            outline: none;
        }

        #button {
            color: #ffffff;
            background-color: #3f51b5;
        }

        #button:disabled {
            color: #9e9e9e;
            background-color: #e0e0e0;
        }

        #center {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="demo-layout mdl-layout mdl-layout--fixed-header mdl-js-layout mdl-color--grey-100">
        <div class="demo-ribbon"></div>
        <main class="demo-main mdl-layout__content">
            <div class="demo-container mdl-grid">
                <div class="mdl-cell mdl-cell--2-col mdl-cell--hide-tablet mdl-cell--hide-phone"></div>
                <div class="demo-content mdl-color--white mdl-shadow--4dp content mdl-color-text--grey-800 mdl-cell mdl-cell--8-col">
                    <div class="demo-crumbs mdl-color-text--grey-500">Coffee</div>
                    <h3>Coffee</h3>

                    Offer coffee to passengers<br><br>

                    <form id="form" method="post">
                        <input type="hidden" name="language" value="en">

                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="text" id="train" name="train"
                                   onkeyup="validate()" autocomplete="off">
                            <label class="mdl-textfield__label" for="train">Train</label>
                        </div>
                        <br><br><br>

                        <div id="center">
                            <button disabled type="submit" id="button" form="form"
                                    class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">
                                PUBLISH OFFER
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
    </div>

    <script src="https://code.getmdl.io/1.2.1/material.min.js"></script>
    <script>
        function validate() {
            document.getElementById('button').disabled = document.getElementById('train').value.length == 0;
        }
    </script>
</body>
</html>
