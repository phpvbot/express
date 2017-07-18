<?php

namespace Qbhy\VbotExpress;

use Hanson\Vbot\Extension\AbstractMessageHandler;
use Illuminate\Support\Collection;

class VbotExpress extends AbstractMessageHandler
{

    public $author = '96qbhy';

    public $name = 'express';

    public $zhName = '快递查询';

    public $version = '1.0';

    public function register()
    {
        // TODO: Implement register() method.
        //稍等片刻
    }

    public function handler(Collection $collection)
    {
        // TODO: Implement handler() method.
    }
}