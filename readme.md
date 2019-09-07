# Mailer for Laravel 5

### Installation

* `composer require nztim/mailer2`
* Register the service provider: `NZTim\Mailer\MailerServiceProvider`

### Usage and architecture

* Create message command classes which extend `NZTim\Mailer\AbstractMessage`.
* Use the constructor and overrides as required to set up the required and optional data items.
* To send, pass the message (directly or via command bus) to `NZTim\Mailer\MessageHandler::handle()`.
* On successful send, a `NZTim\Mailer\MessageSent` event is dispatched which can be used to log or otherwise record outgoing messages.

### Testing

* Each message must implement a static `test()` method, which returns a new message with dummy data.
* Also required is a `testLabel()` to give the message a name.
* Create a console command extending `NZTim\Mailer\TestEmailsCommand`
    * Override the `$recipient` property and add your default test recipient
    * Override the `$tests` property and add an array of your message classes
* The `php artisan testemails` can now be used to send test messages
    * The recipient will be overridden and cc/bcc instructions will be ignored
    * No `MessageSent` event will be fired for tests

