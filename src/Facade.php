<?php
namespace Observer\LaravelPdd;

use Illuminate\Support\Facades\Facade as LaravelFacade;

class Facade extends LaravelFacade
{
    /**
     * @return string
     */
    public static function getFacadeAccessor()
    {
        return 'EasyPdd';
    }
}
