<?php

namespace NZTim\Mailer;

abstract class AbstractMessage
{
    public $sender;
    public $recipient;
    public $subject;
    public $view;
    public $senderName = null;
    public $replyTo = null;
    public $recipientOverride = null;
    public $cc = null;
    public $bcc = null;
    public $data = [];

    abstract public static function test(): AbstractMessage;
    abstract public function testLabel(): string;
}
