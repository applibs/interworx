<?php

namespace Interworx\Siteworx\Ftp;

use Interworx;

/**
 * Class Sessions
 *
 * @package Interworx\Siteworx\Ftp
 */
class Sessions extends Interworx\WorxBase
{
    /**
     * Kill ftp sessions
     *
     * @param array $sessions integer
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function kill(array $sessions)
    {
        $params = ['sessions' => $sessions];

        return $this->parent->call('siteworx', '/ftp/sessions', 'kill', $params);
    }

    /**
     * List Ftp Sessions
     *
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function listFtpSessions()
    {
        return $this->parent->call('siteworx', '/ftp/sessions', 'listFtpSessions');
    }

}