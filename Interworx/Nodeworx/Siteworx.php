<?php

namespace Interworx\Nodeworx;

use Interworx;

/**
 * Trait Siteworx
 *
 * @package Nodeworx
 */
class Siteworx extends Interworx\WorxBase
{

    /**
     * Get siteworx accout details
     *
     * @param string $domain Domain name
     * @return array
     * @throws Interworx\InterworxException
     */
    public function get(string $domain)
    {
        $params = ['domain' => $domain];

        return $this->parent->call('nodeworx', '/siteworx', 'querySiteworxAccountDetails', $params);
    }

    /**
     * Add a SiteWorx account.
     *
     * @param string $master_domain
     * @param string $master_domain_ipv4
     * @param string $packagetemplate
     * @param int    $create_package
     * @param string $new_package_name
     * @param array  $additional_ipv4
     * @param array  $additional_ipv6
     * @param string $php_version (system-php, /opt/remi/php70, /opt/remi/php71)
     * @param array  $php_available
     * @param int    $billing_day
     * @param string $password
     * @param string $language
     * @param string $theme
     * @param string $menu_style
     * @param string $encrypted
     * @param string $email
     * @param string $nickname
     * @param string $uniqname
     * @param string $database_server
     * @param string $ipv6_pool
     * @param string $master_domain_ipv6_from_pool
     * @param int    $master_domain_ipv6
     * @param array  $OPT
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function add(string $master_domain, string $email, string $password, string $packagetemplate = '', string $master_domain_ipv4 = '', string $encrypted = 'n', string $nickname = '', string $uniqname = '', int $create_package = 0, string $new_package_name = '', array $additional_ipv4 = [], array $additional_ipv6 = [], string $php_version = '', array $php_available = [], int $billing_day = 0, string $language = 'en-us', string $theme = 'heliotrope', string $menu_style = 'big', string $database_server = 'localhost', string $ipv6_pool = '', string $master_domain_ipv6_from_pool = '', int $master_domain_ipv6 = 0, array $OPT = [])
    {
        if(!$packagetemplate && empty($OPT)) {
            $this->parent->errors[] = 'Missing Package template or hosting parameters.';

            return false;
        }
        $exists = $this->parent->Nodeworx()->Packages()->exists($packagetemplate);
        if(!$exists) {
            $this->parent->errors[] = 'Package template not exists.';

            return false;
        }

        if(!$master_domain_ipv4) {
            $ips = $this->parent->Nodeworx()->Siteworx()->listSharedFreeIps();
            if(!$ips) {
                $this->parent->errors[] = 'Missing IP address.';

                return false;
            }
            $master_domain_ipv4 = $ips[0]['ipaddr'];
        }

        //for unix it must me alphacharacters only due possible problems with: chown $user somefile
        if(empty($uniqname)) {
            $uniqname = substr(str_shuffle('abcdefghijklmnopqrstuvwxyz'),1,8);
        }

        $params = [
            'master_domain'      => $master_domain,
            'packagetemplate'    => $packagetemplate,
            'email'              => $email,
            'password'           => $password,
            'confirm_password'   => $password,
            'encrypted'          => $encrypted,
            'uniqname'           => $uniqname,
            'master_domain_ipv4' => $master_domain_ipv4,
            'ipv6_pool'          => $ipv6_pool,
            'database_server'    => $database_server,
            'billing_day'        => $billing_day ? $billing_day : date('j'),
            'language'           => $language,
            'theme'              => $theme,
            'menu_style'         => $menu_style,
            'simplescripts'      => 0
        ];
        if($nickname) {
            $params['nickname'] = $nickname;
        }
        if($master_domain_ipv6) {
            $params['master_domain_ipv6'] = $master_domain_ipv6;
        }
        if($master_domain_ipv6_from_pool) {
            $params['master_domain_ipv6_from_pool'] = $master_domain_ipv6_from_pool;
        }
        if($additional_ipv4) {
            $params['additional_ipv4'] = $additional_ipv4;
        }
        if($additional_ipv6) {
            $params['additional_ipv6'] = $additional_ipv6;
        }
        if($php_version) {
            $params['php_version'] = $php_version;
        }
        else {
            $params['php_version'] = '/opt/remi/php74';
        }
        if($php_available) {
            $params['php_available'] = $php_available;
        }
        else {
            $params['php_available'] = [
                '/opt/remi/php70', '/opt/remi/php71', '/opt/remi/php72', '/opt/remi/php73', '/opt/remi/php74', '/opt/remi/php80'
            ];
        }
        if($create_package && $new_package_name && !empty($OPT)) {
            $params['create_package'] = $create_package;
            $params['new_package_name'] = $new_package_name;
        }
        if(!empty($OPT)) {
            $params = array_merge($this->siteworxOpt($OPT), $params);
        }

        $result = $this->parent->call('nodeworx', '/siteworx', 'add', $params);

        if($result) {
            return $uniqname;
        }

        return $result;
    }

    /**
     * @param array $opt
     * @return array
     */
    protected function siteworxOpt(array $opt)
    {
        $default = ['OPT_STORAGE'              => 1000,
                    'OPT_BANDWIDTH'            => 1000,
                    'OPT_EMAIL_ALIASES'        => 10,
                    'OPT_EMAIL_AUTORESPONDERS' => 10,
                    'OPT_EMAIL_BOXES'          => 10,
                    'OPT_EMAIL_GROUPS'         => 10,
                    'OPT_FTP_ACCOUNTS'         => 10,
                    'OPT_MYSQL_DBS'            => 10,
                    'OPT_MYSQL_DB_USERS'       => 10,
                    'OPT_POINTER_DOMAINS'      => 10,
                    'OPT_SLAVE_DOMAINS'        => 10,
                    'OPT_SUBDOMAINS'           => 10,
                    'OPT_BACKUP'               => 1,
                    'OPT_CGI_ACCESS'           => 1,
                    'OPT_CRONTAB'              => 1,
                    'OPT_DNS_RECORDS'          => 1,
                    'OPT_SSL'                  => 1,
                    'OPT_BURSTABLE'            => 1,
                    'OPT_SAVE_XFER_LOGS'       => 1,
                    'fpm_max_children'         => 4,
                    'fpm_max_requests'         => 8192,
                    'fpm_process_management'   => 'ondemand', //dynamic, static, ondemand
                    'fpm_start_servers'        => 2,
                    'fpm_min_spare_servers'    => 1,
                    'fpm_max_spare_servers'    => 4,
                    'fpm_process_idle_timeout' => 's(1000)',
                    'restart_httpd'            => 1,
                    'simplescripts'            => 0
        ];

        return array_merge($default, $opt);
    }

    /**
     * Delete a siteworx account
     *
     * @param string $domain Domain name
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function delete(string $domain)
    {
        $data = ['domain' => $domain];

        return $this->parent->call('nodeworx', '/siteworx', 'delete', $data);
    }


    /**
     * Edit a siteworx account
     *
     * @param string $domain
     * @param string $packagetemplate
     * @param string $email
     * @param string $password
     * @param string $encrypted
     * @param int    $status
     * @param int    $reseller
     * @param string $nickname
     * @param string $php_version
     * @param array  $php_available
     * @param int    $billing_day
     * @param string $language
     * @param string $theme
     * @param string $menu_style
     * @param string $ipv6_pool
     * @param array  $OPT
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function edit(string $domain, string $packagetemplate, string $email, string $password, string $encrypted = 'n', int $status = 1, int $reseller = 0, string $nickname = '', string $php_version = '', array $php_available = [], int $billing_day = 0, string $language = 'en-us', string $theme = 'heliotrope', string $menu_style = 'big', string $ipv6_pool = '', array $OPT = [])
    {
        $exists = $this->parent->Nodeworx()->Packages()->exists($packagetemplate);

        if(!$exists) {
            $this->parent->errors[] = 'Package template not exists.';

            return false;
        }

        $params = [
            'domain'           => $domain,
            'packagetemplate'  => $packagetemplate,
            'status'           => $status,
            'email'            => $email,
            'password'         => $password,
            'confirm_password' => $password,
            'encrypted'        => $encrypted,
            'ipv6_pool'        => $ipv6_pool,
            'billing_day'      => $billing_day ? $billing_day : date('j'),
            'language'         => $language,
            'theme'            => $theme,
            'menu_style'       => $menu_style,
            'simplescripts'    => 0
        ];
        if($nickname) {
            $params['nickname'] = $nickname;
        }
        if($reseller) {
            $params['reseller'] = $reseller;
        }
        if($php_version) {
            $params['php_version'] = $php_version;
        }
        if($php_available) {
            $params['php_available'] = $php_available;
        }
        if(!empty($OPT)) {
            $params = array_merge($this->siteworxOpt($OPT), $params);
        }

        return $this->parent->call('nodeworx', '/siteworx', 'edit', $params);
    }

    /**
     * Suspend a siteworx account
     *
     * @param array $domain Domain name
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function suspend(array $domain)
    {
        $params = ['domain' => $domain];

        return $this->parent->call('nodeworx', '/siteworx', 'suspend', $params);
    }

    /**
     * Unsuspend a siteworx account
     *
     * @param array $domain Domain name
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function unsuspend(array $domain)
    {
        $params = ['domain' => $domain];

        return $this->parent->call('nodeworx', '/siteworx', 'unsuspend', $params);
    }

    /**
     * Adds an IP to the list of available IPs for a SiteWorx account.
     *
     * @param string $domain
     * @param array  $ipv4
     * @param array  $ipv6
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function addIp(string $domain, array $ipv4 = [], array $ipv6 = [])
    {
        $params = [
            'domain' => $domain
        ];
        if($ipv4) {
            $params['ipv4'] = $ipv4;
        }
        if($ipv6) {
            $params['ipv6'] = $ipv6;
        }

        return $this->parent->call('nodeworx', '/siteworx', __FUNCTION__, $params);
    }

    /**
     * Delete SiteWorx Level Config Data
     *
     * @param string $master_domain
     * @param string $config_name
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function deleteConfig(string $master_domain, string $config_name)
    {
        $params = [
            'master_domain' => $master_domain,
            'config_name'   => $config_name
        ];

        return $this->parent->call('nodeworx', '/siteworx', __FUNCTION__, $params);
    }

    /**
     * List Siteworx accounts summary.
     */
    public function listAccounts()
    {
        return $this->parent->call('nodeworx', '/siteworx', __FUNCTION__);
    }

    /**
     * Lists bandwidth and storage usage for current billing period in megabytes.
     *
     * @deprecated
     */
    public function listBandwidthAndStorage()
    {
    }

    /**
     * Lists bandwidth and storage usage for current billing period in megabytes
     */
    public function listBandwidthAndStorageInMB()
    {
        return $this->parent->call('nodeworx', '/siteworx', __FUNCTION__);
    }

    /**
     * List all SiteWorx Level Config Data
     *
     * @param string $master_domain
     * @return mixed
     * @throws Interworx\InterworxException
     * @version 6.1.22-1486
     */
    public function listConfig(string $master_domain)
    {
        $params = [
            'master_domain' => $master_domain
        ];

        return $this->parent->call('nodeworx', '/siteworx', __FUNCTION__, $params);
    }

    /**
     * List bw data for all master and secondary domains for the active biling period
     */
    public function listCurrentDomainBandwidthData()
    {
        return $this->parent->call('nodeworx', '/siteworx', __FUNCTION__);
    }

    /**
     * List available dedicated ip addresses
     */
    public function listDedicatedFreeIps()
    {
        return $this->parent->call('nodeworx', '/siteworx', __FUNCTION__);
    }

    /**
     * List Siteworx accounts including master and secondary domain details.
     *
     * @version 6.1.23-1488
     */
    public function listDomainAccounts()
    {
        return $this->parent->call('nodeworx', '/siteworx', __FUNCTION__);
    }

    /**
     * List available ip addresses
     */
    public function listFreeIps()
    {
        return $this->parent->call('nodeworx', '/siteworx', __FUNCTION__);
    }

    /**
     * List master domains
     */
    public function listMasterDomains()
    {
        return $this->parent->call('nodeworx', '/siteworx', __FUNCTION__);
    }

    /**
     * List available shared ip addresses
     */
    public function listSharedFreeIps()
    {
        $result = $this->parent->call('nodeworx', '/siteworx', __FUNCTION__);
        $ips = [];
        if($result) {
            foreach($result as $ip) {
                $ips[] = $ip[0];
            }

            return $ips;
        }

        return $result;
    }

    /**
     * This action has been deprecated as of version 4.8.0-393. 2011-01-21 Use listAccounts
     *
     * @deprecated
     */
    public function listSiteworxAccounts()
    {
    }

    /**
     * Find existing package template names and match account packages to them
     */
    public function matchPackagesWithTemplates()
    {
        return $this->parent->call('nodeworx', '/siteworx', __FUNCTION__);
    }

    /**
     * Query Siteworx Account bandwidth usage data for any billing period
     *
     * @param array $domains
     * @param int   $timestamp A Unix Timestamp to identify the billing period from which the bandwidth data will be shown. If blank, defaults to the current time
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function queryAccountBandwidth(array $domains, int $timestamp = 0)
    {
        $params = [
            'domains' => $domains
        ];
        if($timestamp) {
            $params['timestamp'] = $timestamp;
        }

        return $this->parent->call('nodeworx', '/siteworx', __FUNCTION__, $params);
    }

    /**
     * Displays Ips that are available to a master siteworx account.
     *
     * @param string $domain
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function queryAvailableIps(string $domain)
    {
        $params = [
            'domain' => $domain
        ];

        return $this->parent->call('nodeworx', '/siteworx', __FUNCTION__, $params);
    }

    /**
     * Query SiteWorx Level Config Data
     *
     * @param string $master_domain
     * @param string $config_name
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function queryConfig(string $master_domain, string $config_name)
    {
        $params = [
            'master_domain' => $master_domain,
            'config_name'   => $config_name
        ];

        return $this->parent->call('nodeworx', '/siteworx', __FUNCTION__, $params);
    }

    /**
     * Query the system for a domain information
     *
     * @param string $domain
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function queryDomain(string $domain)
    {
        $params = [
            'domain' => $domain
        ];

        return $this->parent->call('nodeworx', '/siteworx', __FUNCTION__, $params);
    }

    /**
     * Get info about a domain on the system. Can be used to see if a domain exists
     *
     * @param string $domain
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function queryDomainInfo(string $domain)
    {
        $params = [
            'domain' => $domain
        ];

        return $this->parent->call('nodeworx', '/siteworx', __FUNCTION__, $params);
    }

    /**
     * Displays the information available to the action "edit".
     */
    public function queryEdit()
    {
        return $this->parent->call('nodeworx', '/siteworx', __FUNCTION__);
    }

    /**
     * Displays the information available to the action "ips".
     *
     * @param string $domain
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function queryIps(string $domain)
    {
        $params = [
            'domain' => $domain
        ];

        return $this->parent->call('nodeworx', '/siteworx', __FUNCTION__, $params);
    }

    /**
     * Get all SiteWorx account properties of a given domain
     *
     * @param string $domain
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function querySiteworxAccountDetails(string $domain)
    {
        $params = [
            'domain' => $domain
        ];

        return $this->parent->call('nodeworx', '/siteworx', __FUNCTION__, $params);
    }

    /**
     * Query Siteworx accounts by specifying which properties you want returned.
     *
     * @param array $domain
     * @param array $account_data
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function querySiteworxAccounts(array $domain, array $account_data = ['id', 'status', 'domain'])
    {
        $params = [
            'domain'       => $domain,
            'account_data' => $account_data
        ];

        return $this->parent->call('nodeworx', '/siteworx', __FUNCTION__, $params);
    }

    /**
     * Removes IPs from SiteWorx account.
     *
     * @param string $domain
     * @param array  $ip
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function removeIp(string $domain, array $ip)
    {
        $params = [
            'domain' => $domain,
            'ip'     => $ip
        ];

        return $this->parent->call('nodeworx', '/siteworx', __FUNCTION__, $params);
    }

    /**
     * Search siteworx accounts summary
     *
     * @param string $reseller
     * @param string $query
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function search(string $reseller, string $query)
    {
        $params = [
            'reseller' => $reseller,
            'query'    => $query
        ];

        return $this->parent->call('nodeworx', '/siteworx', __FUNCTION__, $params);
    }

    /**
     * Set SiteWorx Level Config Data
     *
     * @param string $master_domain
     * @param array  $config_name
     * @param array  $config_value
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function setConfig(string $master_domain, array $config_name, array $config_value)
    {
        $params = [
            'master_domain' => $master_domain,
            'config_name'   => $config_name,
            'config_value'  => $config_value
        ];

        return $this->parent->call('nodeworx', '/siteworx', __FUNCTION__, $params);
    }

    /**
     * Login to a given SiteWorx account.
     *
     * @param string $login_domain
     * @param string $account_action
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function siteworxLogin(string $login_domain, string $account_action = 'siteworxLogin')
    {
        $params = [
            'login_domain'   => $login_domain,
            'account_action' => $account_action
        ];

        return $this->parent->call('nodeworx', '/siteworx', __FUNCTION__, $params);
    }

    /**
     * Suspend a SiteWorx account by unix user name
     *
     * @param array $user
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function suspendByUser(array $user)
    {
        $params = [
            'user' => $user
        ];

        return $this->parent->call('nodeworx', '/siteworx', __FUNCTION__, $params);
    }

    /**
     * Synchronize server aliases with InterWorx database.
     *
     * @param string $domain
     * @param bool   $cascade_to_nodes
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function syncServerAlias(string $domain, bool $cascade_to_nodes = false)
    {
        $params = [
            'domain' => $domain
        ];
        if($cascade_to_nodes) {
            $params['cascade_to_nodes'] = 1;
        }

        return $this->parent->call('nodeworx', '/siteworx', __FUNCTION__, $params);
    }

    /**
     * Synchronize InterWorx and Apache vitrual host blocks
     *
     * @param string $domain
     * @param bool   $cascade_to_nodes
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function syncVirtualHosts(string $domain, bool $cascade_to_nodes = false)
    {
        $params = [
            'domain' => $domain
        ];
        if($cascade_to_nodes) {
            $params['cascade_to_nodes'] = 1;
        }

        return $this->parent->call('nodeworx', '/siteworx', __FUNCTION__, $params);
    }

    /**
     * Toggle a "favorite" SiteWorx account.
     *
     * @param string $domain
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function toggleFavorite(string $domain)
    {
        $params = [
            'domain' => $domain
        ];

        return $this->parent->call('nodeworx', '/siteworx', __FUNCTION__, $params);
    }

    /**
     * Unsuspend a SiteWorx account by unix user name.
     *
     * @param array $user
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function unsuspendByUser(array $user)
    {
        $params = [
            'user' => $user
        ];

        return $this->parent->call('nodeworx', '/siteworx', __FUNCTION__, $params);
    }
}