<?php

namespace Interworx\Siteworx;

use Interworx;

/**
 * Class Logout
 *
 * @package Interworx\Siteworx
 */
class Logout extends Interworx\WorxBase
{
    /**
     * Logout of SiteWorx
     *
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function logout()
    {
        return $this->parent->call('siteworx', '/logout', 'logout');
    }

}