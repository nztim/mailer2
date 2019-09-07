<?php

namespace NZTim\Mailer;

abstract class AbstractMessage
{
    protected $sender;
    protected $recipient;
    protected $subject;
    protected $view;
    protected $senderName = null;
    protected $replyTo = null;
    protected $recipientOverride = null;
    protected $cc = null;
    protected $bcc = null;
    protected $data = [];

    // Required ---------------------------------------------------------------

    abstract public static function test(): AbstractMessage;

    abstract public function testLabel(): string;

    public function sender(): string
    {
        return $this->sender;
    }

    public function recipient(): string
    {
        return $this->recipient;
    }

    public function subject(): string
    {
        return $this->subject;
    }

    public function view(): string
    {
        return $this->view;
    }

    public function data(): array
    {
        return $this->data;
    }

    // Optional ---------------------------------------------------------------

    public function senderName(): ?string
    {
        return $this->senderName;
    }

    public function replyTo(): ?string
    {
        return $this->replyTo;
    }

    public function recipientOverride(string $recipient = null): ?string
    {
        if (!is_null($recipient) && filter_var($recipient, FILTER_VALIDATE_EMAIL) !== false) {
            $this->recipientOverride = $recipient;
        }
        return $this->recipientOverride;
    }

    public function cc(): ?string
    {
        return $this->cc;
    }

    public function bcc(): ?string
    {
        return $this->bcc;
    }
}
