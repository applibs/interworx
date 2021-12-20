<?php

namespace Interworx\Siteworx\Ssl;

use Interworx;

/**
 * Class Key
 *
 * @package Interworx\Siteworx\Ssl
 */
class Key extends Interworx\WorxBase
{
    /**
     * Delete SSL private key.
     *
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function delete()
    {
        return $this->parent->call('siteworx', '/ssl/key', 'delete');
    }

    /**
     * Generate an SSL Key
     *
     * @param int $key_length (2048, 3072, 4096)
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function generate(int $key_length = 2048)
    {
        $params = ['key_length' => $key_length];

        return $this->parent->call('siteworx', '/ssl/key', 'generate', $params);
    }

    /**
     * Get SSL Private Key.
     *
     * @return mixed
     * @throws Interworx\InterworxException
     * @version 6.0.11-1380
     */
    public function getSslKey()
    {
        return $this->parent->call('siteworx', '/ssl/key', 'getSslKey');
    }

    /**
     * Install SSL private key.
     *
     * @param $key
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function install($key)
    {
        $params = ['key' => $key];

        return $this->parent->call('siteworx', '/ssl/key', 'install', $params);
    }


}