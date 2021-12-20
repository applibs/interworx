<?php

namespace Interworx\Nodeworx;

use Interworx;

class Apikey extends Interworx\WorxBase
{

    /**
     * @return bool
     * @throws Interworx\InterworxException
     */
    public function delete()
    {
        return $this->parent->call('nodeworx', '/apikey', 'delete');
    }

    /**
     * @return bool
     * @throws Interworx\InterworxException
     */
    public function generate()
    {
        return $this->parent->call('nodeworx', '/apikey', 'generate');
    }

    /**
     * @return string
     * @throws Interworx\InterworxException
     */
    public function list()
    {
        return $this->parent->call('nodeworx', '/apikey', 'listApikey');
    }

}