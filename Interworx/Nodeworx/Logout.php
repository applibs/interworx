<?php

namespace Interworx\Nodeworx;

use Interworx;

class Logout extends Interworx\WorxBase
{

    /**
     * @return bool
     * @throws Interworx\InterworxException
     */
    public function logout()
    {
        return $this->parent->call('nodeworx', '/logout', 'logout');
    }

}