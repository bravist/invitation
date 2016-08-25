<?php
namespace Bravist\Invitation;

use Illuminate\Support\Facades\Facade as LaravelFacade;

class Facade extends LaravelFacade
{
    /**
     * 默认为 Server
     *
     * @return string
     */
    static public function getFacadeAccessor()
    {
        return 'invitation';
    }

}
