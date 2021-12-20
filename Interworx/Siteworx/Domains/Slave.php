<?php

namespace Interworx\Siteworx\Domains;

use Interworx;

/**
 * Class Slave
 *
 * @package Interworx\Siteworx\Domains
 */
class Slave extends Interworx\WorxBase
{

    /**
     * Add a secondary domain
     *
     * @param string $domain
     * @param string $php_version
     * @param string $ipv4
     * @param string $ipv6
     * @param string $ipv6_from_pool
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function add(string $domain, string $php_version = '', string $ipv4 = '', string $ipv6 = '', string $ipv6_from_pool = '')
    {
        // domain: (http://www.) + domain
        $params = ['domain' => $domain];
        if($php_version) {
            $params['php_version'] = $php_version;
        }
        if($ipv4) {
            $params['ipv4'] = $ipv4;
        }
        if($ipv6) {
            $params['ipv6'] = $ipv6;
        }
        if($ipv6_from_pool) {
            $params['ipv6_from_pool'] = $ipv6_from_pool;
        }

        //php_version,ipv4,ipv6,ipv6_from_pool
        return $this->parent->call('siteworx', '/domains/slave', 'add', $params);
    }

    /**
     * Edit a secondary domain
     *
     * @param string $domain
     * @param string $php_version
     * @param string $ipv4
     * @param string $ipv6
     * @param string $ipv6_from_pool
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function edit(string $domain, string $php_version = '', string $ipv4 = '', string $ipv6 = '', string $ipv6_from_pool = '')
    {
        // domain: (http://www.) + domain
        $params = ['domain' => $domain];
        if($php_version) {
            $params['php_version'] = $php_version;
        }
        if($ipv4) {
            $params['ipv4'] = $ipv4;
        }
        if($ipv6) {
            $params['ipv6'] = $ipv6;
        }
        if($ipv6_from_pool) {
            $params['ipv6_from_pool'] = $ipv6_from_pool;
        }

        //php_version,ipv4,ipv6,ipv6_from_pool
        return $this->parent->call('siteworx', '/domains/slave', 'edit', $params);
    }

    /**
     * Delete a secondary domain.
     *
     * @param array $domain
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function delete(array $domain = [])
    {
        // domain: (http://www.) + domain
        $params = ['domain' => $domain];

        return $this->parent->call('siteworx', '/domains/slave', 'delete', $params);
    }

    /**
     * List master domain and secondary domains.
     *
     * @throws Interworx\InterworxException
     */
    public function listSecondaryDomains()
    {
        return $this->parent->call('siteworx', '/domains/slave', 'listSecondaryDomains');
    }

    /**
     * Displays the information available to the action "edit".
     *
     * @param string $domain
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function queryEdit(string $domain)
    {
        $params = ['domain' => $domain];

        return $this->parent->call('siteworx', '/domains/slave', 'queryEdit', $params);
    }

    /**
     * Set Domain Level Config Data
     *
     * @param string $domain
     * @param array  $config_name
     * @param array  $config_value
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function setConfig(string $domain, array $config_name = [], array $config_value = [])
    {
        $params = [
            'domain' => $domain
        ];

        if($config_name && $config_value) {
            $params['config_name'] = $config_name;
            $params['config_value'] = $config_value;
        }

        return $this->parent->call('siteworx', '/domains/slave', 'setConfig', $params);
    }

    /**
     * Delete Domain Level Config Data.
     *
     * @param string $domain
     * @param array  $config_name
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function deleteConfig(string $domain, array $config_name = [])
    {
        $params = [
            'domain' => $domain
        ];

        if($config_name) {
            $params['config_name'] = $config_name;
        }

        return $this->parent->call('siteworx', '/domains/slave', 'deleteConfig', $params);
    }

    /**
     * Query Domain Level Config Data.
     *
     * @param string $domain
     * @param string $config_name
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function queryConfig(string $domain, string $config_name = '')
    {
        $params = [
            'domain' => $domain,
        ];
        if($config_name) {
            $params['config_name'] = $config_name;
        }

        return $this->parent->call('siteworx', '/domains/slave', 'queryConfig', $params);
    }

    /**
     * List all SiteWorx Level Config Data
     *
     * @param string $domain
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function listConfig(string $domain)
    {
        $params = ['domain' => $domain];

        return $this->parent->call('siteworx', '/domains/slave', 'listConfig', $params);
    }

    /**
     * @deprecated
     */
    public function list()
    {
    }

    /**
     * @deprecated
     */
    public function listIds()
    {
    }

}