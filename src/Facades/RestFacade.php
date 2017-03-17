<?php
namespace Novatree\RestModel\Facades;
use Illuminate\Support\Facades\Facade;


class  RestFacade extends Facade
{
    /**
     *  RestFacade binds RestModelServices class with Laravel Service Container.
     *
     *  the getFacadeAccessor() method returns the named string of the RestModelServices class.
     *
     *  Actually the binding with restModel name has been implemented in
     *  RestModelServiceProvider class.
     *
     *
     *
     * @return String
     */


    protected static function getFacadeAccessor() { return 'restModel'; }


}



?>