<?php

namespace Interworx\Siteworx;

use Interworx;

/**
 * Class Mysql
 *
 * @package Interworx\Siteworx
 */
class Mysql extends Interworx\WorxBase
{
    public function Db(): Mysql\Db
    {
        return new Mysql\Db($this->parent);
    }

    public function User(): Mysql\User
    {
        return new Mysql\User($this->parent);
    }

    public function Perms(): Mysql\Perms
    {
        return new Mysql\Perms($this->parent);
    }
}