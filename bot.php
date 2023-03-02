<?php
    $token = '5852228268:AAF7dwIDA2zK-bSVrCDWgobJ4pJadMCCr98';
    $web = 'htpps://api.telegram.org/bot' . $token;

    $input = file_get_contents('php://input');
    $update = json_decode($input, true);

    $chatId = $update['message']['chat']['id'];
    $msg = $update['message']['text'];

    switch($message) {
        case '/start':
            $response = 'Bot activado';
            sendMessage($chatId, $response);
            break;
        case '/info':
            $response = 'Hola, soy @robomedac_bot'
            sendMessage($chatId, $response);
            break;
        default:
            $response = 'No entiendo';
            sendMessage($chatId, $response);
            break;
    }
    
    function sendMessage($chatId, $response) {
        $url = $GLOBALS['web'] . '/sendMessage?chat_id='.$chatId.'&parse_mode=HTML&text='. urlencode($response);
        file_get_contents($url);
    }
?>