<?php

namespace Interworx\Siteworx\Email;

use Interworx;

/**
 * Class Spf
 *
 * @package Interworx\Siteworx\Email
 */
class Spf extends Interworx\WorxBase
{

    /**
     * Delete a domain SPF configuration.
     *
     * @param array $record_id
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function delete(array $record_id)
    {
        $params = [
            'record_id' => $record_id
        ];

        return $this->parent->call('siteworx', '/email/spf', 'delete', $params);
    }

    /**
     * Edit a single domain SPF configuration.
     *
     * @param int    $record_id
     * @param string $host
     * @param int    $ttl
     * @param string $spf_record_value
     * @param string $spf_version
     * @param int    $use_a
     * @param int    $use_mx
     * @param int    $use_ptr
     * @param int    $other_servers
     * @param array  $mechanism_a
     * @param array  $mechanism_mx
     * @param array  $mechanism_ip4
     * @param array  $mechanism_ip6
     * @param array  $mechanism_ptr
     * @param array  $mechanism_exists
     * @param array  $mechanism_include
     * @param string $all
     * @param string $redirect
     * @param string $explanation
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function edit(int   $record_id, string $host, int $ttl = 43200, string $spf_record_value = 'v=spf1', string $spf_version = 'v=spf1', int $use_a = 0, int $use_mx = 0, int $use_ptr = 0, int $other_servers = 0,
                         array $mechanism_a = [], array $mechanism_mx = [], array $mechanism_ip4 = [], array $mechanism_ip6 = [], array $mechanism_ptr = [], array $mechanism_exists = [],
                         array $mechanism_include = [], string $all = '', string $redirect = '', string $explanation = '')
    {
        $params = [
            'record_id'        => $record_id,
            'host'             => $host,
            'ttl'              => $ttl,
            'spf_record_value' => $spf_record_value,
            'spf_version'      => $spf_version,
            'use_a'            => $use_a,
            'use_mx'           => $use_mx,
            'use_ptr'          => $use_ptr,
            'other_servers'    => $other_servers,
        ];
        if($mechanism_a) {
            $params['mechanism_a'] = $mechanism_a;
        }
        if($mechanism_mx) {
            $params['mechanism_mx'] = $mechanism_mx;
        }
        if($mechanism_ip4) {
            $params['mechanism_ip4'] = $mechanism_ip4;
        }
        if($mechanism_ip6) {
            $params['mechanism_ip6'] = $mechanism_ip6;
        }
        if($mechanism_ptr) {
            $params['mechanism_ptr'] = $mechanism_ptr;
        }
        if($mechanism_exists) {
            $params['mechanism_exists'] = $mechanism_exists;
        }
        if($mechanism_include) {
            $params['mechanism_include'] = $mechanism_include;
        }
        if($all) {
            $params['all'] = $all;
        }
        if($redirect) {
            $params['redirect'] = $redirect;
        }
        if($explanation) {
            $params['explanation'] = $explanation;
        }

        return $this->parent->call('siteworx', '/email/spf', 'edit', $params);
    }

    /**
     * Edit all domains SPF configuration.
     *
     * @param string $spf_record_value
     * @param string $spf_version
     * @param int    $use_a
     * @param int    $use_mx
     * @param int    $use_ptr
     * @param int    $other_servers
     * @param array  $mechanism_a
     * @param array  $mechanism_mx
     * @param array  $mechanism_ip4
     * @param array  $mechanism_ip6
     * @param array  $mechanism_ptr
     * @param array  $mechanism_exists
     * @param array  $mechanism_include
     * @param string $all
     * @param string $redirect
     * @param string $explanation
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function editAll(string $spf_record_value = 'v=spf1', string $spf_version = 'v=spf1', int $use_a = 0, int $use_mx = 0, int $use_ptr = 0, int $other_servers = 0,
                            array  $mechanism_a = [], array $mechanism_mx = [], array $mechanism_ip4 = [], array $mechanism_ip6 = [], array $mechanism_ptr = [], array $mechanism_exists = [],
                            array  $mechanism_include = [], string $all = '', string $redirect = '', string $explanation = '')
    {
        $params = [
            'spf_record_value' => $spf_record_value,
            'spf_version'      => $spf_version,
            'use_a'            => $use_a,
            'use_mx'           => $use_mx,
            'use_ptr'          => $use_ptr,
            'other_servers'    => $other_servers,
        ];
        if($mechanism_a) {
            $params['mechanism_a'] = $mechanism_a;
        }
        if($mechanism_mx) {
            $params['mechanism_mx'] = $mechanism_mx;
        }
        if($mechanism_ip4) {
            $params['mechanism_ip4'] = $mechanism_ip4;
        }
        if($mechanism_ip6) {
            $params['mechanism_ip6'] = $mechanism_ip6;
        }
        if($mechanism_ptr) {
            $params['mechanism_ptr'] = $mechanism_ptr;
        }
        if($mechanism_exists) {
            $params['mechanism_exists'] = $mechanism_exists;
        }
        if($mechanism_include) {
            $params['mechanism_include'] = $mechanism_include;
        }
        if($all) {
            $params['all'] = $all;
        }
        if($redirect) {
            $params['redirect'] = $redirect;
        }
        if($explanation) {
            $params['explanation'] = $explanation;
        }

        return $this->parent->call('siteworx', '/email/spf', 'editAll', $params);
    }

    /**
     * Lists the SPF records.
     *
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function listSpfRecords()
    {
        return $this->parent->call('siteworx', '/email/spf', 'listSpfRecords');
    }

    /**
     * Displays the information available to the action "edit".
     *
     * @param int $record_id
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function queryEdit(int $record_id)
    {
        $params = [
            'record_id' => $record_id
        ];

        return $this->parent->call('siteworx', '/email/spf', 'queryEdit', $params);
    }

}