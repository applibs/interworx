<?php

namespace Interworx\Nodeworx;

use Interworx;

class Logs extends Interworx\WorxBase
{

    /**
     * View system logs. Required Permissions "IWORXLOGS"
     *
     * @param string $group
     * @return bool
     * @throws Interworx\InterworxException
     */
    public function view(string $group)
    {
        $groups = ['IWorx', 'Dns', 'System', 'Ftp', 'Mysql', 'Ssh', 'Mail', 'Http'];
        if(\in_array($group, $groups, true)) {
            return $this->parent->call('nodeworx', '/logs', 'view', ['group' => $group]);
        }

        return false;
    }
}