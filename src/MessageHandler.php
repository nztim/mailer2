<?php

namespace NZTim\Mailer;

use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Events\Dispatcher;
use Illuminate\Mail\Message as LaravelEmail;
use Soundasleep\Html2Text;

class MessageHandler
{
    private $mailer;
    private $dispatcher;

    public function __construct(Mailer $mailer, Dispatcher $dispatcher)
    {
        $this->mailer = $mailer;
        $this->dispatcher = $dispatcher;
    }

    public function handle(AbstractMessage $message): ?MessageSent
    {
        $data = array_merge($message->data(), ['nztmailerSubject' => $message->subject()]);
        $html = CssInliner::process(view($message->view())->with($data)->render());
        $text = Html2Text::convert($html);
        $data = array_merge($data, ['nztmailerHtml' => $html, 'nztmailerText' => $text]);
        $this->mailer->send(['nztmailer::echo-html', 'nztmailer::echo-text'], $data, function ($email) use ($message) {
            /** @var LaravelEmail $email */
            $email->subject($message->subject());
            $email->to($message->recipientOverride() ?: $message->recipient());
            $email->from($message->sender(), $message->senderName());
            if ($message->replyTo()) {
                $email->replyTo($message->replyTo());
            }
            if ($message->cc() && !$message->recipientOverride()) {
                $email->cc($message->cc());
            }
            if ($message->bcc() && !$message->recipientOverride()) {
                $email->bcc($message->bcc());
            }
        });
        if ($message->recipientOverride()) {
            return null;
        }
        $event = new MessageSent([
            'sender'     => $message->sender(),
            'senderName' => $message->senderName(),
            'replyTo'    => $message->replyTo(),
            'recipient'  => $message->recipient(),
            'cc'         => $message->cc(),
            'bcc'        => $message->bcc(),
            'subject'    => $message->subject(),
            'html'       => $html,
            'text'       => $text,
        ]);
        $this->dispatcher->dispatch($event);
        return $event;
    }
}
