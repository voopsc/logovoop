<?php

namespace Logovoop;

/**
 * Class MessageWorker
 * @package Logovoop
 */
class MessageWorker {

    /**
     * @var string $botApiKey default telegram api key
     */
    private $token = '';

    /**
     * @var string $botUserName default telegram api requested bot name
     */
    private $botUserName = '';

    /**
     * @var string $hookURL default telegram api hook link
     */
    private  $hookURL;

    public function __construct(string $token, string $botUserName, string $hookURL)
    {
        $this->botApiKey = $token;
        $this->botUserName = $botUserName;
        $this->hookURL = $hookURL;
    }

    /**
     * Setup webkook which is neccessary for api work
     * call it once when you just register bot in botFather
     */
    public function setWebHook()
    {
        try {
            $telegram = new \Longman\TelegramBot\Telegram($this->botApiKey, $this->botUserName);

            $result = $telegram->setWebhook($this->hookURL);
            if ($result->isOk()) {
                echo $result->getDescription();
            }
        } catch (\Longman\TelegramBot\Exception\TelegramException $e) {
             echo $e->getMessage();
        }
    }

    /**
     * test
     */
    public function foo()
    {
        try {
            $telegram = new \Longman\TelegramBot\Commands;
            $telegram->replyToChat('qoqoqo');
        } catch (\Longman\TelegramBot\Exception\TelegramException $e) {
             echo $e->getMessage();
        }
    }

}