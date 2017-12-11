<?php
require_once("vendor/autoload.php");

use Viber\Client;

$apiKey = '470d69cebea7d368-c0fc6ecb1b6c4720-f2e55cd91322af40'; // from "Edit Details" page
$webhookUrl = 'https://chatapi.viber.com/pa/setWebhook'; // for exmaple https://my.com/bot.php

try {
    $client = new Client([ 'token' => $apiKey ]);
    $result = $client->getAccountInfo();
    echo ("<pre>");
    print_r($result);
    echo ("</pre>");
} catch (Exception $e) {
    echo "Error: ". $e->getError() ."\n";
}