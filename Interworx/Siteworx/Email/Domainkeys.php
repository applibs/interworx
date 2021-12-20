<?php

namespace Interworx\Siteworx\Email;

use Interworx;

/**
 * Class Domainkeys
 *
 * @package Interworx\Siteworx\Email
 */
class Domainkeys extends Interworx\WorxBase
{

    /**
     * Add DomainKeys configuration
     *
     * @param string $domain
     * @param int    $testing_mode (0,1)
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function add(string $domain, int $testing_mode = 0)
    {
        $params = [
            'domain' => $domain
        ];

        if($testing_mode) {
            $params['testing_mode'] = 1;
        }

        return $this->parent->call('siteworx', '/email/domainkeys', 'add', $params);
    }

    /**
     * Delete DomainKeys configuration
     *
     * @param array $domain
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function delete(array $domain)
    {
        $params = [
            'domain' => $domain
        ];

        return $this->parent->call('siteworx', '/email/domainkeys', 'delete', $params);
    }

    /**
     * Edit DomainKeys configuration
     *
     * @param string $domain
     * @param int    $testing_mode
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function edit(string $domain, int $testing_mode = 0)
    {
        $params = [
            'domain' => $domain
        ];

        if($testing_mode) {
            $params['testing_mode'] = 1;
        }

        return $this->parent->call('siteworx', '/email/domainkeys', 'edit', $params);
    }

    /**
     * Lists the domain keys
     *
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function listDomainKeys()
    {
        return $this->parent->call('siteworx', '/email/domainkeys', 'listDomainKeys');
    }

    /**
     * List the domain key DNS records for a given domain
     *
     * @param string $domain
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function queryDomainKeys(string $domain)
    {
        $params = [
            'domain' => $domain
        ];

        return $this->parent->call('siteworx', '/email/domainkeys', 'queryDomainKeys', $params);
    }

    /**
     * Displays the information available to the action "edit"
     *
     * @param string $domain
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function queryEdit(string $domain)
    {
        $params = [
            'domain' => $domain
        ];

        return $this->parent->call('siteworx', '/email/domainkeys', 'queryEdit', $params);
    }

    /**
     * Displays the information available to the action "view"
     *
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function queryView()
    {
        return $this->parent->call('siteworx', '/email/domainkeys', 'queryView');
    }

    /**
     * View a set of domainkeys for a given domain
     *
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function view()
    {
        return $this->parent->call('siteworx', '/email/domainkeys', 'view');
    }

}