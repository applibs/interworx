<?php

namespace Interworx\Siteworx;

use Interworx;

/**
 * Class Twofactorauth
 *
 * @package Interworx\Siteworx
 */
class Twofactorauth extends Interworx\WorxBase
{

    /**
     * Delete action
     *
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function delete()
    {
        return $this->parent->call('siteworx', '/twofactorauth', 'delete');
    }

    /**
     * Generate action
     *
     * @param int $code
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function generate(int $code)
    {
        $params = [
            'code' => $code
        ];

        return $this->parent->call('siteworx', '/twofactorauth', 'generate', $params);
    }

}