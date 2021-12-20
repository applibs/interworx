<?php

namespace Interworx\Siteworx;

use Interworx;

class Index extends Interworx\WorxBase
{
    /**
     * @return array
     * @throws Interworx\InterworxException
     */
    public function getSession()
    {
        return $this->parent->call('siteworx', '/index', 'getSession');
    }

}