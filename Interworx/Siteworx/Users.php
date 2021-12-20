<?php

namespace Interworx\Siteworx;

use Interworx;

/**
 * Class Users
 *
 * @package Interworx\Siteworx
 */
class Users extends Interworx\WorxBase
{

    /**
     * Add a siteworx user.
     *
     * @param string $email
     * @param string $password
     * @param string $encrypted
     * @param string $language pl, de, ru, it, tr, en-us, hu, sv, sk, es, zh, da, nl, fr, cs, pt
     * @param string $nickname
     * @param string $menu_style
     * @param array  $perms
     * @param string $locked_domains
     * @return bool
     * @throws Interworx\InterworxException
     */
    public function add(string $email,string $password,string $encrypted = 'n', string $language = 'en-us', string $nickname = '', string $menu_style = '', array $perms = [], string $locked_domains = '')
    {
        $params = [
            'email'            => $email,
            'password'         => $password,
            'confirm_password' => $password
        ];
        if($encrypted !== 'n') {
            $params['encrypted'] = 'y';
        }
        if($language !== 'en-us') {
            $params['language'] = $language;
        }
        if($nickname) {
            $params['nickname'] = $nickname;
        }
        if($menu_style) {
            $params['menu_style'] = $menu_style;
        }
        if($perms) {
            $params['perms'] = $perms;
        }
        if($locked_domains) {
            $params['locked_domains'] = $locked_domains;
        }

        return $this->parent->call('siteworx', '/users', 'add', $params);
    }

    /**
     * Edit a siteworx user
     *
     * @param string $email
     * @param string $password
     * @param string $encrypted
     * @param string $language
     * @param string $nickname
     * @param string $menu_style
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function edit(string $email, string $password, string $encrypted = 'n', string $language = 'en-us', string $nickname = '', string $menu_style = '')
    {
        $params = [
            'user'             => $email,
            'email'            => $email,
            'password'         => $password,
            'confirm_password' => $password
        ];
        if($encrypted !== 'n') {
            $params['encrypted'] = 'y';
        }
        if($language !== 'en-us') {
            $params['language'] = $language;
        }
        if($nickname) {
            $params['nickname'] = $nickname;
        }
        if($menu_style) {
            $params['menu_style'] = $menu_style;
        }

        return $this->parent->call('siteworx', '/users', 'edit', $params);
    }

    /**
     * @param array $user
     * @return bool
     * @throws Interworx\InterworxException
     */
    public function activate(array $user)
    {
        $params = ['user' => $user];

        return $this->parent->call('siteworx', '/users', 'activate', $params);
    }

    /**
     * @param array $user
     * @return bool
     * @throws Interworx\InterworxException
     */
    public function deactivate(array $user)
    {
        $params = ['user' => $user];

        return $this->parent->call('siteworx', '/users', 'deactivate', $params);
    }

    /**
     * @param array $user
     * @return bool
     * @throws Interworx\InterworxException
     */
    public function delete(array $user)
    {
        $params = ['user' => $user];

        return $this->parent->call('siteworx', '/users', 'delete', $params);
    }

    /**
     * @deprecated
     */
    public function list()
    {
    }

    /**
     * List deletable SiteWorx users
     *
     * @return array
     * @throws Interworx\InterworxException
     */
    public function listDeletable()
    {
        return $this->parent->call('siteworx', '/users', 'listDeletable');
    }

    /**
     * List editable SiteWorx users
     *
     * @return array
     * @throws Interworx\InterworxException
     */
    public function listEditable()
    {
        return $this->parent->call('siteworx', '/users', 'listEditable');
    }

    /**
     * Get details of the working user
     *
     * @return array
     * @throws Interworx\InterworxException
     */
    public function listMasterUser()
    {
        return $this->parent->call('siteworx', '/users', 'listMasterUser');
    }

    /**
     * List SiteWorx users
     *
     * @return array
     * @throws Interworx\InterworxException
     */
    public function listUsers()
    {
        return $this->parent->call('siteworx', '/users', 'listUsers');
    }

    /**
     * Get details of the working user
     *
     * @return array
     * @throws Interworx\InterworxException
     */
    public function listWorkingUser()
    {
        return $this->parent->call('siteworx', '/users', 'listWorkingUser');
    }

    /**
     * Displays the information available to the action "edit"
     *
     * @param string $user
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function queryEdit(string $user)
    {
        $params = ['user' => $user];

        return $this->parent->call('siteworx', '/users', 'queryEdit', $params);
    }


}