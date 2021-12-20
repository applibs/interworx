<?php

namespace Interworx\Siteworx\Mysql;

use Interworx;

/**
 * Class Db
 *
 * @package Interworx\Siteworx\Mysql
 */
class Db extends Interworx\WorxBase
{

    /**
     * Add a mysql database.
     *
     * @param string $name
     * @param string $dbUser
     * @param string $password
     * @param string $host
     * @param array  $perms struct (string)
     * @return bool|mixed
     */
    public function add(string $name, string $dbUser = '', string $password = '', string $host = '', array $perms = [])
    {
        if($this->exists($name)) {
            $this->parent->errors[] = 'Db already exists.';

            return false;
        }

        $params = [
            'name' => $name
        ];

        if($host) {
            $params['host'] = $host;//$this->listMysqlHost()
        }

        if($perms) {
            $params['perms'] = $perms;
        }

        if($dbUser) {
            $params['user'] = $dbUser;
            $user = $this->parent->Siteworx()->Mysql()->User()->exists($dbUser);
            if($user) {
                $params['user'] = $user;
            }
            elseif($password) {
                $params['create_user'] = 1;
                $params['password'] = $password;
                $params['confirm_password'] = $password;
            }
        }

        $result = $this->parent->call('siteworx', '/mysql/db', 'add', $params);

        if($result) {
            if($dbUser) {
                $db = $this->exists($name);
                $user = $this->parent->Siteworx()->Mysql()->User()->exists($dbUser);

                return ['db' => $db, 'user' => $user];
            }

            return $this->exists($name);
        }

        return $result;
    }

    /**
     * Delete a mysql database
     *
     * @param array $name
     * @return bool
     */
    public function delete(array $name)
    {
        $params = ['name' => $name];

        return $this->parent->call('siteworx', '/mysql/db', 'delete', $params);
    }

    /**
     * @deprecated
     */
    public function list()
    {
    }

    /**
     * @param string $db
     * @return bool
     * @throws Interworx\InterworxException
     */
    protected function exists(string $db)
    {
        $dbs = $this->listMysqlDatabases();
        if($dbs) {
            foreach($dbs as $item) {
                if($item['name'] === $db) {
                    return $item['fqdn'];
                }
            }
        }

        return false;
    }

    /**
     * List MySQL Databases
     *
     * @return array|mixed
     * @throws Interworx\InterworxException
     */
    public function listMysqlDatabases()
    {
        $result = $this->parent->call('siteworx', '/mysql/db', 'listMysqlDatabases');
        if($result) {
            $result = (array)$result;
        }

        return $result;
    }

    /**
     * List the mysql host for this account (localhost, 22.33.44.55, etc).
     *
     * @return array
     * @throws Interworx\InterworxException
     */
    public function listMysqlHost()
    {
        return $this->parent->call('siteworx', '/mysql/db', 'listMysqlHost');
    }

}