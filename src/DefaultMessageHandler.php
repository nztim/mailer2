<?php

namespace NZTim\Mailer;

class DefaultMessageHandler
{
    private $mailer;

    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function handle(AbstractMessage $message)
    {
        $this->mailer->send($message);
    }
}
