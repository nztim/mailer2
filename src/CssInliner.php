<?php

namespace NZTim\Mailer;

use Pelago\Emogrifier;

class CssInliner
{
    /** @var Emogrifier */
    protected static $instance;

    protected static function instance() : Emogrifier
    {
        if (is_null(static::$instance)) {
            static::$instance = app(Emogrifier::class);
        }
        return static::$instance;
    }

    public static function process(string $html) : string
    {
        $emogrifier = static::instance();
        $emogrifier->setHtml($html);
        return $emogrifier->emogrify();
    }
}
