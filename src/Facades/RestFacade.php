<?php
namespace Novatree\Rest\Facades;

use Illuminate\Support\Facades\Facade;

class RestFacade extends Facade
{
    /**
     *  RestFacade binds RestServices class with Laravel Service Container.
     *
     *  the getFacadeAccessor() method returns the named string of the RestServices class.
     *
     *  Actually the binding with rest name has been implemented in
     *  RestServiceProvider class.
     *
     *
     *
     * @return String
     */
    protected static function getFacadeAccessor()
    {
        return 'rest';
    }
}
