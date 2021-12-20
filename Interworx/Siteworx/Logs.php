<?php

namespace Interworx\Siteworx;

use Interworx;

class Logs extends Interworx\WorxBase
{

    /**
     * View system logs. Required Permissions "IWORXLOGS"
     *
     * @param string $group
     * @return bool
     * @throws Interworx\InterworxException
     */
    public function view(string $group)
    {
        //Http, LetsEncrypt
        $groups = ['Http', 'LetsEncrypt'];
        if(\in_array($group, $groups, true)) {
            return $this->parent->call('siteworx', '/logs', 'view', ['group' => $group]);
        }

        return false;
    }

    /**
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function listLogs()
    {
        return $this->parent->call('siteworx', '/logs', 'listLogs');
    }
}