<?php

namespace Interworx\Siteworx\Mysql;

use Interworx;

/**
 * Class User
 *
 * @package Interworx\Siteworx\Mysql
 */
class User extends Interworx\WorxBase
{

    /**
     * Add a mysql user
     *
     * @param string $name
     * @param string $password
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function add(string $name, string $password = '')
    {
        $params = [
            'name' => $name
        ];
        if($password) {
            $params['password'] = $password;
            $params['confirm_password'] = $password;
        }

        return $this->parent->call('siteworx', '/mysql/user', 'add', $params);
    }

    /**
     * Delete a mysql user.
     *
     * @param array $name
     * @return bool
     */
    public function delete(array $name)
    {
        $params = ['name' => $name];

        return $this->parent->call('siteworx', '/mysql/user', 'delete', $params);
    }

    /**
     * Edit a mysql user
     *
     * @param string $name
     * @param string $password
     * @return bool|mixed
     */
    public function edit(string $name, string $password = '')
    {
        if($this->queryEdit($name)) {
            $params = [
                'name' => $name
            ];
            if($password) {
                $params['password'] = $password;
                $params['confirm_password'] = $password;
            }

            return $this->parent->call('siteworx', '/mysql/user', 'edit', $params);

        }

        return false;
    }

    /**
     * @deprecated
     */
    public function list()
    {
    }

    /**
     * @param string $name
     * @return bool
     * @throws Interworx\InterworxException
     */
    public function exists(string $name)
    {
        $users = $this->listMysqlUsers();
        if($users) {
            foreach($users as $item) {
                if($item['name'] === $name) {
                    return $item['fqun'];
                }
            }
        }

        return false;
    }

    /**
     * List MySQL users
     *
     * @return array|mixed
     * @throws Interworx\InterworxException
     */
    public function listMysqlUsers()
    {
        $result = $this->parent->call('siteworx', '/mysql/user', 'listMysqlUsers');
        if($result) {
            $result = (array)$result;
        }

        return $result;
    }

    /**
     * @param string $name
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function queryEdit(string $name)
    {
        $params = ['name' => $name];

        return $this->parent->call('siteworx', '/mysql/user', 'queryEdit', $params);
    }


}