<?php

use NZTim\Mailer\Mailer;

class ExampleMessageHandler
{
    private $mailer;

    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function handle(ExampleMessage $message)
    {
        // If you need to reconstitute models from IDs, use the database, etc. - do that here
        // If you only need to send the message then you can use the DefaultMessageHandler
        // Reconstitute models from IDs, etc.
        $this->mailer->send($message);
    }
}
