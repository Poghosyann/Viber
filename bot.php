<?php

require_once("vendor/autoload.php");

use Viber\Bot;
use Viber\Api\Sender;

$apiKey = '470d69cebea7d368-c0fc6ecb1b6c4720-f2e55cd91322af40';

$botSender = new Sender([
    'name' => 'ArmViber',
    'avatar' => 'https://dl-media.viber.com/5/share/2/long/vibes/icon/image/0x0/baa1/d2d966fde4984ff50eb0e555887c8dd66aea9431cc91a09ac49d0f472a36baa1.jpg',
]);

try {
    $bot = new Bot(['token' => $apiKey]);
    $bot->onConversation(function ($event) use ($bot, $botSender) {
        // this event fires if user open chat, you can return "welcome message"
        // to user, but you can't send more messages!
        return (new \Viber\Api\Message\Text())
            ->setSender($botSender)
            ->setText("Can i help you?");
    })
    ->onText('|.*|s', function ($event) use ($bot, $botSender) {
        // match by template, for example "whois Bogdaan"
        $bot->getClient()->sendMessage(
            (new \Viber\Api\Message\Text())
            ->setSender($botSender)
            ->setReceiver($event->getSender()->getId())
            ->setText("I do not know )")
        );
    })
    ->run();
} catch (Exception $e) {
    echo ("<h1>");
    echo "Error ";
    echo ("</h1>");
}