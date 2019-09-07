<?php

namespace NZTim\Mailer;

use Carbon\Carbon;

class MessageSent
{
    protected $date;
    protected $sender;
    protected $senderName;
    protected $replyTo;
    protected $recipient;
    protected $cc;
    protected $bcc;
    protected $subject;
    protected $html;
    protected $text;

    public function __construct(array $data)
    {
        $fields = [
            'sender',
            'senderName',
            'replyTo',
            'recipient',
            'cc',
            'bcc',
            'subject',
            'html',
            'text',
        ];
        foreach ($fields as $field) {
            $this->$field = $data[$field] ?? '';
        }
        $this->date = now();
    }

    public function date(): Carbon
    {
        return $this->date;
    }

    public function sender(): string
    {
        return $this->sender;
    }

    public function senderName(): string
    {
        return $this->senderName;
    }

    public function replyTo(): string
    {
        return $this->replyTo;
    }

    public function recipient(): string
    {
        return $this->recipient;
    }

    public function cc(): string
    {
        return $this->cc;
    }

    public function bcc(): string
    {
        return $this->bcc;
    }

    public function subject(): string
    {
        return $this->subject;
    }

    public function html(): string
    {
        return $this->html;
    }

    public function text(): string
    {
        return $this->text;
    }

    public function toArray(): array
    {
        return [
            'date' => $this->date,
            'sender'     => $this->sender(),
            'senderName' => $this->senderName(),
            'replyTo'    => $this->replyTo(),
            'recipient'  => $this->recipient(),
            'cc'         => $this->cc(),
            'bcc'        => $this->bcc(),
            'subject'    => $this->subject(),
            'html'       => $this->html(),
            'text'       => $this->text(),
        ];
    }
}
