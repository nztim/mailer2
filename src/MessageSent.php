<?php

namespace NZTim\Mailer;

use Carbon\Carbon;

class MessageSent
{
    private Carbon $date;
    private string $sender;
    private string $senderName;
    private string $replyTo;
    private string $recipient;
    private string $cc;
    private string $bcc;
    private string $subject;
    private string $html;
    private string $text;
    private string $messageId;

    public function __construct(array $data)
    {
        $this->date = now();
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
            'messageId',
        ];
        foreach ($fields as $field) {
            $this->$field = $data[$field] ?? '';
        }
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

    public function messageId(): string
    {
        return $this->messageId;
    }

    public function toArray(): array
    {
        return [
            'date'       => $this->date,
            'sender'     => $this->sender(),
            'senderName' => $this->senderName(),
            'replyTo'    => $this->replyTo(),
            'recipient'  => $this->recipient(),
            'cc'         => $this->cc(),
            'bcc'        => $this->bcc(),
            'subject'    => $this->subject(),
            'html'       => $this->html(),
            'text'       => $this->text(),
            'messageId'  => $this->messageId(),
        ];
    }
}
