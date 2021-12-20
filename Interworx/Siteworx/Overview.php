<?php

namespace Interworx\Siteworx;

use Interworx;

/**
 * Class Overview
 *
 * @package Interworx\Siteworx
 */
class Overview extends Interworx\WorxBase
{

    /**
     * Edit the currently authenticated users’ profile
     *
     * @param string $language
     * @param string $menu_style
     * @param string $password
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function editProfile(string $language = '', string $menu_style = '', string $password = '')
    {
        $params = [];
        if($language) {
            $params['language'] = $language;
        }
        if($menu_style) {
            $params['menu_style'] = $menu_style;
        }
        if($password) {
            $params['password'] = $password;
            $params['confirm_password'] = $password;
        }
        if(!empty($params)) {
            return $this->parent->call('siteworx', '/overview', 'editProfile', $params);
        }

        return true;
    }

    /**
     * List siteworx account details.
     *
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function listAccountDetails()
    {
        return $this->parent->call('siteworx', '/overview', 'listAccountDetails');
    }

    /**
     * List available disk space action
     *
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function listAvailableDiskSpace()
    {
        return $this->parent->call('siteworx', '/overview', 'listAvailableDiskSpace');
    }

    /**
     * List the InterWorx license key
     *
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function listLicenseKey()
    {
        return $this->parent->call('siteworx', '/overview', 'listLicenseKey');
    }

    /**
     * List the current master domain
     *
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function listMasterDomain()
    {
        return $this->parent->call('siteworx', '/overview', 'listMasterDomain');
    }

    /**
     * Get the mode php is running under
     *
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function listPhpInstallMode()
    {
        return $this->parent->call('siteworx', '/overview', 'listPhpInstallMode');
    }

    /**
     * List the version of InterWorx installed.
     *
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function listVersion()
    {
        return $this->parent->call('siteworx', '/overview', 'listVersion');
    }

    /**
     * List the current working domain
     *
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function listWorkingDomain()
    {
        return $this->parent->call('siteworx', '/overview', 'listWorkingDomain');
    }

    /**
     * Displays the information available to the action "editProfile"
     *
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function queryEditProfile()
    {
        return $this->parent->call('siteworx', '/overview', 'queryEditProfile');
    }


}