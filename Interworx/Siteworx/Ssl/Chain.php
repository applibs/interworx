<?php

namespace Interworx\Siteworx\Ssl;

use Interworx;

/**
 * Class Chain
 *
 * @package Interworx\Siteworx\Ssl
 */
class Chain extends Interworx\WorxBase
{
    /**
     * Delete SSL chain certificate
     *
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function delete()
    {
        return $this->parent->call('siteworx', '/ssl/chain', 'delete');
    }

    /**
     * Get SSL Chain Certificate
     *
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function getSslChain()
    {
        return $this->parent->call('siteworx', '/ssl/chain', 'getSslChain');
    }

    /**
     * Install SSL chain certificate.
     *
     * @param string $chain
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function install(string $chain)
    {
        $params = ['chain' => $chain];

        return $this->parent->call('siteworx', '/ssl/chain', 'install', $params);
    }

}