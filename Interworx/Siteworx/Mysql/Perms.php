<?php

namespace Interworx\Siteworx\Mysql;

use Interworx;

/**
 * Class Perms
 *
 * @package Interworx\Siteworx\Mysql
 */
class Perms extends Interworx\WorxBase
{

    /**
     * Add mysql permissions
     *
     * @param string $name
     * @param string $user
     * @param array  $perms
     * @param string $host
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function add(string $name,string $user, array $perms = [],string $host = '%')
    {
        $params = [
            'name' => $name,
            'user' => $user
        ];

        if($perms) {
            $params['perms'] = $perms;
        }
        if($host) {
            $params['host'] = $host;
        }

        return $this->parent->call('siteworx', '/mysql/perms', 'add', $params);
    }

    /**
     * Edit mysql permissions
     *
     * @param array $perms
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function edit(array $perms)
    {
        $params = ['perms' => $perms];

        return $this->parent->call('siteworx', '/mysql/perms', 'edit', $params);
    }

    /**
     * List available MySQL permissions.
     *
     * @throws Interworx\InterworxException
     */
    public function listAvailablePerms()
    {
        return $this->parent->call('siteworx', '/mysql/perms', 'listAvailablePerms');
    }

    /**
     * Given a database, find all the db users and their permissions on that db
     *
     * @param string $db
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function queryDatabaseUserPerms(string $db)
    {
        $params = ['name' => $db];

        return $this->parent->call('siteworx', '/mysql/perms', 'queryDatabaseUserPerms', $params);
    }

    /**
     * Displays the information available to the action "edit"
     *
     * @throws Interworx\InterworxException
     */
    public function queryEdit()
    {
        return $this->parent->call('siteworx', '/mysql/perms', 'queryEdit');
    }

}