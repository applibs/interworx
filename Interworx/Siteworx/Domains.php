<?php

namespace Interworx\Siteworx;

use Interworx;

/**
 * Class Domains
 *
 * @package Interworx\Siteworx
 */
class Domains extends Interworx\WorxBase
{

    /**
     * @return Domains\Php
     */
    public function Php()
    {
        return new Domains\Php($this->parent);
    }

    /**
     * @return Domains\Pointer
     */
    public function Pointer()
    {
        return new Domains\Pointer($this->parent);
    }

    /**
     * @return Domains\Slave
     */
    public function Slave()
    {
        return new Domains\Slave($this->parent);
    }

    /**
     * @return Domains\Sub
     */
    public function Sub()
    {
        return new Domains\Sub($this->parent);
    }
}