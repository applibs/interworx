<?php

namespace Interworx\Siteworx\Ssl;

use Interworx;

/**
 * Class Crt
 *
 * @package Interworx\Siteworx\Ssl
 */
class Crt extends Interworx\WorxBase
{
    /**
     * Delete a SSL certificate
     *
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function delete()
    {
        return $this->parent->call('siteworx', '/ssl/crt', 'delete');
    }

    /**
     * Get SSL Certificate
     *
     * @return mixed
     * @throws Interworx\InterworxException
     * @version 6.0.11-1380
     */
    public function getSslCrt()
    {
        return $this->parent->call('siteworx', '/ssl/crt', 'getSslCrt');
    }

    /**
     * Install a SSL certificate
     *
     * @param string $crt
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function install(string $crt)
    {
        $params = ['crt' => $crt];

        return $this->parent->call('siteworx', '/ssl/crt', 'install', $params);
    }

}