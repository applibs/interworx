<?php

namespace Interworx\Siteworx;

use Interworx;

/**
 * Class Email
 *
 * @package Interworx\Siteworx
 */
class Email extends Interworx\WorxBase
{
    /**
     * @return Email\Alias
     */
    public function Alias()
    {
        return new Email\Alias($this->parent);
    }

    /**
     * @return Email\Autoresponde
     */
    public function Autoresponde()
    {
        return new Email\Autoresponde($this->parent);
    }

    /**
     * @return Email\Box
     */
    public function Box()
    {
        return new Email\Box($this->parent);
    }

    /**
     * @return Email\Domainkeys
     */
    public function Domainkeys()
    {
        return new Email\Domainkeys($this->parent);
    }

    /**
     * @return Email\Filters
     */
    public function Filters()
    {
        return new Email\Filters($this->parent);
    }

    /**
     * @return Email\Group
     */
    public function Group()
    {
        return new Email\Group($this->parent);
    }

    /**
     * @return Email\RemoteSetup
     */
    public function RemoteSetup()
    {
        return new Email\RemoteSetup($this->parent);
    }

    /**
     * @return Email\Spamprefs
     */
    public function Spamprefs()
    {
        return new Email\Spamprefs($this->parent);
    }

    /**
     * @return Email\Spf
     */
    public function Spf()
    {
        return new Email\Spf($this->parent);
    }

    /**
     * @param bool $enable
     * @return bool
     * @throws Interworx\InterworxException
     */
    public function editBounce(bool $enable)
    {
        //enablebounce
        $params = ['enablebounce' => (int)$enable];

        return $this->parent->call('siteworx', '/email', 'editBounce', $params);
    }

    /**
     * @return array
     * @throws Interworx\InterworxException
     */
    public function queryEditBounce()
    {
        return $this->parent->call('siteworx', '/email', 'queryEditBounce');
    }

}