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
        return 'pdd.application';
    }

    /**
     * @param string $name
     * @return \EasyPdd\Foundation\Application
     */
    public static function application($name = '')
    {
        return $name ? app('pdd.application.'.$name) : app('pdd.application');
    }
}
