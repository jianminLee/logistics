<?php


namespace Jianminlee\Logistics\Facades;


use Illuminate\Support\Facades\Facade;

class Logistics extends Facade
{
    protected static function getFacadeAccessor() {

        return 'logistics';
    }
}
