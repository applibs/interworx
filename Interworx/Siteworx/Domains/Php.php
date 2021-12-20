<?php

namespace Interworx\Siteworx\Domains;

use Interworx;

/**
 * Class Php
 *
 * @package Interworx\Siteworx\Domains
 */
class Php extends Interworx\WorxBase
{

    /**
     * Edit PHP options.
     *
     * @param string $domain
     * @param string $php_version {/opt/remi/php71}
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function edit(string $domain, string $php_version = '')
    {
        $params = [
            'domain' => $domain
        ];
        if($php_version) {
            $params['php_version'] = '/opt/remi/php'.$php_version;
        }

        return $this->parent->call('siteworx', '/domains/php', 'edit', $params);
    }

    /**
     * Show FPM options for this SiteWorx account
     *
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function listFpmOptions()
    {
        return $this->parent->call('siteworx', '/domains/php', 'listFpmOptions');
    }

    /**
     * List php versions for master and secondary domains
     *
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function listPhpVersions()
    {
        return $this->parent->call('siteworx', '/domains/php', 'listPhpVersions');
    }

}