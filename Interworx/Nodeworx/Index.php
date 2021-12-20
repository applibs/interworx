<?php

namespace Interworx\Nodeworx;

use Interworx;

class Index extends Interworx\WorxBase
{
    /**
     * @return array
     * @throws Interworx\InterworxException
     */
    public function getSession()
    {
        return $this->parent->call('nodeworx', '/index', 'getSession');
    }

    /**
     * @return array
     * @throws Interworx\InterworxException
     */
    public function getWebsetupStatus()
    {
        return $this->parent->call('nodeworx', '/index', 'getWebsetupStatus');
    }
}