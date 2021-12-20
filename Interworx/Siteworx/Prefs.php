<?php

namespace Interworx\Siteworx;
use Interworx;

/**
 * Class Prefs
 * @package Interworx\Siteworx
 */
class Prefs extends Interworx\WorxBase
{
    /**
     * Change PHP Options
     *
     * @param string $default_php_version
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function phpOptions(string $default_php_version)
    {
        $params = [
            'default_php_version' => $default_php_version
        ];

        return $this->parent->call('siteworx', '/prefs', 'phpOptions', $params);
    }

}