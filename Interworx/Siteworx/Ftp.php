<?php

namespace Interworx\Siteworx;

use Interworx;

/**
 * Trait Ftp
 *
 * @package Siteworx
 */
class Ftp extends Interworx\WorxBase
{
    /**
     * @return Ftp\Sessions
     */
    public function Sessions()
    {
        return new Ftp\Sessions($this->parent);
    }

    /**
     * @param string $user
     * @param string $password
     * @param string $homedir
     * @return mixed
     */
    public function add(string $user, string $password, string $homedir = '')
    {
        $params = [
            'user'             => $user,
            'password'         => $password,
            'confirm_password' => $password
        ];

        if($homedir) {
            $params['homedir'] = $homedir;
        }


        return $this->parent->call('siteworx', '/ftp', 'add', $params);
    }

    /**
     * @param string $user
     * @param string $password
     * @param string $homedir
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function edit(string $user,string $password = '',string $homedir = '')
    {
        $params = [
            'user' => $user
        ];

        if($password) {
            $params['password'] = $password;
            $params['confirm_password'] = $password;
        }
        if($homedir) {
            $params['homedir'] = $homedir;
        }

        return $this->parent->call('siteworx', '/ftp', 'edit', $params);
    }

    /**
     * @param array $user
     * @return mixed
     */
    public function delete(array $user)
    {
        $params = ['user' => $user];

        return $this->parent->call('siteworx', '/ftp', 'delete', $params);
    }

    /**
     * @param string $user
     * @return bool
     * @throws Interworx\InterworxException
     */
    public function exists(string $user)
    {
        $result = $this->listFtpAccounts();
        if($result) {
            foreach($result as $item) {
                if($item['username'] === $user) {
                    return true;
                }
            }
        }

        return false;
    }

    /**
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function listFtpAccounts()
    {
        return $this->parent->call('siteworx', '/ftp', 'listFtpAccounts');
    }

    /**
     * @param string $user Example Values ftp, sw_ftp_secondary
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function queryEdit(string $user)
    {
        $params = [
            'user' => $user
        ];

        return $this->parent->call('siteworx', '/ftp', 'queryEdit', $params);
    }

    /**
     * @param array $user
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function suspend(array $user)
    {
        $params = [
            'user' => $user
        ];

        return $this->parent->call('siteworx', '/ftp', 'suspend', $params);
    }

    /**
     * @param array $user
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function unsuspend(array $user)
    {
        $params = [
            'user' => $user
        ];

        return $this->parent->call('siteworx', '/ftp', 'unsuspend', $params);
    }

}