<?php

namespace Interworx;

/**
 * Class Siteworx
 *
 * @package Interworx
 */
class Siteworx extends WorxBase
{

    /**
     * @return Siteworx\Backup
     */
    public function Backup(): Siteworx\Backup
    {
        return new Siteworx\Backup($this->parent);
    }

    /**
     * @return Siteworx\Cron
     */
    public function Cron(): Siteworx\Cron
    {
        return new Siteworx\Cron($this->parent);
    }

    /**
     * @return Siteworx\Dns
     */
    public function Dns(): Siteworx\Dns
    {
        return new Siteworx\Dns($this->parent);
    }

    /**
     * @return Siteworx\Domains
     */
    public function Domains(): Siteworx\Domains
    {
        return new Siteworx\Domains($this->parent);
    }

    /**
     * @return Siteworx\Email
     */
    public function Email(): Siteworx\Email
    {
        return new Siteworx\Email($this->parent);
    }

    /**
     * @return Siteworx\Ftp
     */
    public function Ftp(): Siteworx\Ftp
    {
        return new Siteworx\Ftp($this->parent);
    }

    /**
     * @return Siteworx\Htaccess
     */
    public function Htaccess(): Siteworx\Htaccess
    {
        return new Siteworx\Htaccess($this->parent);
    }

    /**
     * @return Siteworx\Index
     */
    public function Index(): Siteworx\Index
    {
        return new Siteworx\Index($this->parent);
    }

    /**
     * @return Siteworx\Logout
     */
    public function Logout(): Siteworx\Logout
    {
        return new Siteworx\Logout($this->parent);
    }

    /**
     * @return Siteworx\Logs
     */
    public function Logs(): Siteworx\Logs
    {
        return new Siteworx\Logs($this->parent);
    }

    /**
     * @return Siteworx\Mysql
     */
    public function Mysql(): Siteworx\Mysql
    {
        return new Siteworx\Mysql($this->parent);
    }

    /**
     * @return Siteworx\Notice
     */
    public function Notice(): Siteworx\Notice
    {
        return new Siteworx\Notice($this->parent);
    }

    /**
     * @return Siteworx\Overview
     */
    public function Overview(): Siteworx\Overview
    {
        return new Siteworx\Overview($this->parent);
    }

    /**
     * @return Siteworx\Prefs
     */
    public function Prefs(): Siteworx\Prefs
    {
        return new Siteworx\Prefs($this->parent);
    }

    /**
     * @return Siteworx\Ssl
     */
    public function Ssl(): Siteworx\Ssl
    {
        return new Siteworx\Ssl($this->parent);
    }

    /**
     * @return Siteworx\Twofactorauth
     */
    public function Twofactorauth(): Siteworx\Twofactorauth
    {
        return new Siteworx\Twofactorauth($this->parent);
    }

    /**
     * @return Siteworx\Users
     */
    public function Users(): Siteworx\Users
    {
        return new Siteworx\Users($this->parent);
    }


}