<?php

namespace NZTim\Mailer\Examples;

use NZTim\Mailer\AbstractMessage;

class ExampleMessage extends AbstractMessage
{
    public $sender;
    public $recipient;
    public $subject;
    public $view;
    public $data = [];

    public function __construct(string $name, string $email, string $message)
    {
        $this->data = [
            'name'    => $name,
            'email'   => $email,
            'message' => $message,
        ];
        $this->sender = config('mail.address.system');
        $this->recipient = config('mail.address.admin');
        $this->subject = 'Contact form submission received from ' . $name;
        $this->view = 'emails.contact';
    }

    /** In PHP 7.4 you can return ExampleMessage (covariant) */
    public static function test(): AbstractMessage
    {
        return new ExampleMessage('Barry White', 'barry@example.org', 'This is a message');
    }

    public function testLabel(): string
    {
        return 'Contact form';
    }
}
