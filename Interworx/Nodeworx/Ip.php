<?php
/**
 * Created by PhpStorm.
 * User: A409782
 * Date: 4.7.2018
 * Time: 13:30
 */

namespace Interworx\Nodeworx;
use Interworx;

class Ip extends Interworx\WorxBase
{

    /**
     * List ipv4 addresses on the system
     *
     * @param bool $full
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function listIpAddresses(bool $full = true)
    {
        $result = $this->parent->call('nodeworx', '/ip', __FUNCTION__);
        if($full || !$result) {
            return $result;
        }
        $return = [];
        foreach($result as $item) {
            $type = $item['is_internal'] ? 'INT' : 'SHARED';
            $return[$item['ipaddr']] = $type;
        }

        return $return;
    }
}