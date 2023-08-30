<?php

namespace Mediamaxdk\LaravelSms\Facades;

use Illuminate\Support\Facades\Facade;

class LaravelSms extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return 'laravel-sms';
    }
}
