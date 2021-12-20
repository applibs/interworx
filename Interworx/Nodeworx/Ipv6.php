<?php

namespace Interworx\Nodeworx;

use Interworx;

class Ipv6 extends Interworx\WorxBase
{
    /**
     * Add a new IPv6 Pool.
     *
     * @param string $nickname
     * @param string $ipv6_with_cidr
     * @param int    $subpool_size
     * @param int    $cidr
     * @param string $device              (eth0, lo)
     * @param string $gateway
     * @param string $distribution_policy (random, sequential)
     * @param int    $reseller_id
     * @return bool
     * @throws Interworx\InterworxException
     */
    public function addPool(string $nickname, string $ipv6_with_cidr, int $subpool_size, string $device, string $gateway, int $cidr = 128, string $distribution_policy = 'sequential', int $reseller_id = 0)
    {
        $params = [
            'nickname'            => $nickname,
            'ipv6_with_cidr'      => $ipv6_with_cidr,
            'subpool_size'        => $subpool_size,
            'cidr'                => $cidr,
            'device'              => $device,
            'gateway'             => $gateway,
            'distribution_policy' => $distribution_policy
        ];
        if($reseller_id) {
            $params['reseller_id'] = $reseller_id;
        }

        return $this->parent->call('nodeworx', '/ipv6', 'addPool', $params);
    }

    /**
     * Add a reserved IP or range.
     *
     * @param string $range_start
     * @param string $range_end
     * @param string $note
     * @return bool
     * @throws Interworx\InterworxException
     */
    public function addReservation(string $range_start, string $range_end, string $note = '')
    {
        $params = ['range_start' => $range_start, 'range_end' => $range_end, 'note' => $note];

        return $this->parent->call('nodeworx', '/ipv6', 'deleteReservation', $params);
    }

    /**
     * Delete an unused IPv6 Pool.
     *
     * @param array $pool
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function deletePool(array $pool)
    {
        $params = ['pool' => $pool];

        return $this->parent->call('nodeworx', '/ipv6', 'deletePool', $params);
    }

    /**
     * @param array $ids
     * @return bool
     * @throws Interworx\InterworxException
     */
    public function deleteReservation(array $ids)
    {
        $params = ['id' => $ids];

        return $this->parent->call('nodeworx', '/ipv6', 'deleteReservation', $params);
    }

    /**
     * Edit an IPv6 Pool
     *
     * @param string $pool
     * @param string $nickname (##LG_IPV6_SUBPOOL_OF_X|Pool Test##)
     * @param string $device
     * @param string $gateway  (dead::beef/24)
     * @param int    $cidr
     * @param int    $reseller_id
     * @return bool
     * @throws Interworx\InterworxException
     */
    public function editPool(string $pool, string $nickname, string $device, string $gateway, int $cidr = 128, int $reseller_id = 0)
    {
        $params = [
            'pool'     => $pool,
            'nickname' => $nickname,
            'cidr'     => $cidr,
            'device'   => $device,
            'gateway'  => $gateway
        ];
        if($reseller_id) {
            $params['reseller_id'] = $reseller_id;
        }

        return $this->parent->call('nodeworx', '/ipv6', 'editPool', $params);
    }

    /**
     * Edit a reserved IP or range.
     *
     * @param string $range_start
     * @param string $range_end
     * @param string $note
     * @return bool
     * @throws Interworx\InterworxException
     */
    public function editReservation(string $range_start, string $range_end, string $note = '')
    {
        $params = ['range_start' => $range_start, 'range_end' => $range_end, 'note' => $note];

        return $this->parent->call('nodeworx', '/ipv6', 'editReservation', $params);
    }

    /**
     * Lists information about configured IPv6 Pools.
     *
     * @return array
     * @throws Interworx\InterworxException
     */
    public function listPools()
    {
        return $this->parent->call('nodeworx', '/ipv6', 'listPools');
    }

    /**
     * Lists information reserved IPv6 addresses.
     *
     * @return array
     * @throws Interworx\InterworxException
     */
    public function listReserved()
    {
        return $this->parent->call('nodeworx', '/ipv6', 'listReserved');
    }

    /**
     * Displays the information available to the action "editPool".
     *
     * @param string $pool
     * @return bool
     * @throws Interworx\InterworxException
     */
    public function queryEditPool(string $pool)
    {
        $params = ['pool' => $pool];

        return $this->parent->call('nodeworx', '/ipv6', 'queryEditPool', $params);
    }

    /**
     * Displays the information available to the action "editReservation".
     *
     * @return array
     * @throws Interworx\InterworxException
     */
    public function queryEditReservation()
    {
        return $this->parent->call('nodeworx', '/ipv6', 'queryEditReservation');
    }

}