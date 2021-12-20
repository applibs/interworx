<?php

namespace Interworx;

/**
 * Class Nodeworx
 *
 * @package Interworx
 */
class Nodeworx extends WorxBase
{
    /**
     * @return Nodeworx\Apikey
     */
    public function Apikey(): Nodeworx\Apikey
    {
        return new Nodeworx\Apikey($this->parent);
    }

    /**
     * @return Nodeworx\Index
     */
    public function Index(): Nodeworx\Index
    {
        return new Nodeworx\Index($this->parent);
    }

    /**
     * @return Nodeworx\Ip
     */
    public function Ip(): Nodeworx\Ip
    {
        return new Nodeworx\Ip($this->parent);
    }

    /**
     * @return Nodeworx\Ipv6
     */
    public function Ipv6(): Nodeworx\Ipv6
    {
        return new Nodeworx\Ipv6($this->parent);
    }

    /**
     * @return Nodeworx\Lang
     */
    public function Lang(): Nodeworx\Lang
    {
        return new Nodeworx\Lang($this->parent);
    }

    /**
     * @return Nodeworx\Logout
     */
    public function Logout(): Nodeworx\Logout
    {
        return new Nodeworx\Logout($this->parent);
    }

    /**
     * @return Nodeworx\Logs
     */
    public function Logs(): Nodeworx\Logs
    {
        return new Nodeworx\Logs($this->parent);
    }

    /**
     * @return Nodeworx\Packages
     */
    public function Packages(): Nodeworx\Packages
    {
        return new Nodeworx\Packages($this->parent);
    }

    /**
     * @return Nodeworx\Siteworx
     */
    public function Siteworx(): Nodeworx\Siteworx
    {
        return new Nodeworx\Siteworx($this->parent);
    }
}