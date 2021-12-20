<?php

namespace Interworx\Siteworx\Domains;

use Interworx;

/**
 * Class Sub
 *
 * @package Interworx\Siteworx\Domains
 */
class Sub extends Interworx\WorxBase
{

    /**
     * Add a subdomain
     *
     * @param string $prefix
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function add(string $prefix)
    {
        $params = [
            'prefix' => $prefix
        ];

        return $this->parent->call('siteworx', '/domains/sub', 'add', $params);
    }

    /**
     * Delete a subdomain
     *
     * @param array $prefix
     * @param int   $delete_dir
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function delete(array $prefix = [], int $delete_dir = 0)
    {
        $params = [
            'prefix' => $prefix
        ];
        if($delete_dir) {
            $params['delete_dir'] = 1;
        }

        return $this->parent->call('siteworx', '/domains/sub', 'delete', $params);
    }

    /**
     * List subdomains
     *
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function listSubdomains()
    {
        return $this->parent->call('siteworx', '/domains/sub', 'listSubdomains');
    }

}