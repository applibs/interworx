<?php

namespace Interworx\Siteworx\Email;

use Interworx;

/**
 * Class RemoteSetup
 *
 * @package Interworx\Siteworx\Email
 */
class RemoteSetup extends Interworx\WorxBase
{

    /**
     * Add an MX record
     *
     * @param int    $zone_id
     * @param int    $preference
     * @param string $mail_server
     * @param string $host
     * @param int    $ttl
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function addmx(int $zone_id, int $preference, string $mail_server, string $host = '', int $ttl = 43200)
    {
        $params = [
            'zone_id'     => $zone_id,
            'preference'  => $preference,
            'mail_server' => $mail_server
        ];
        if($host) {
            $params['host'] = $host;
        }
        if($ttl) {
            $params['ttl'] = $ttl;
        }

        return $this->parent->call('siteworx', '/email/remotesetup', 'addmx', $params);
    }

    /**
     * Delete an MX record.
     *
     * @param array $record_id
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function deletemx(array $record_id)
    {
        $params = [
            'record_id' => $record_id
        ];

        return $this->parent->call('siteworx', '/email/remotesetup', 'deletemx', $params);
    }

    /**
     * Disables local delivery for specified domains
     *
     * @param array $domain
     * @param int   $cascade_to_nodes
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function disableLocalDelivery(array $domain, int $cascade_to_nodes = 0)
    {
        $params = [
            'domain' => $domain
        ];
        if($cascade_to_nodes) {
            $params['cascade_to_nodes'] = 1;
        }

        return $this->parent->call('siteworx', '/email/remotesetup', 'disableLocalDelivery', $params);
    }

    /**
     * Enables local delivery for specified domains.
     *
     * @param array $domain
     * @param int   $cascade_to_nodes
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function enableLocalDelivery(array $domain, int $cascade_to_nodes = 0)
    {
        $params = [
            'domain' => $domain
        ];
        if($cascade_to_nodes) {
            $params['cascade_to_nodes'] = 1;
        }

        return $this->parent->call('siteworx', '/email/remotesetup', 'enableLocalDelivery', $params);
    }

    /**
     * Edit an MX record.
     *
     * @param int    $zone_id
     * @param int    $preference
     * @param string $mail_server
     * @param string $host
     * @param int    $ttl
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function editmx(int $zone_id, int $preference = 0, string $mail_server = '', string $host = '', int $ttl = 43200)
    {
        $params = [
            'zone_id' => $zone_id
        ];
        if($preference) {
            $params['preference'] = $preference;
        }
        if($mail_server) {
            $params['mail_server'] = $mail_server;
        }
        if($host) {
            $params['host'] = $host;
        }
        if($ttl) {
            $params['ttl'] = $ttl;
        }

        return $this->parent->call('siteworx', '/email/remotesetup', 'editmx', $params);
    }

    /**
     * Lists the status of local delivery for domains.
     *
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function listLocalDeliveryStatus()
    {
        return $this->parent->call('siteworx', '/email/remotesetup', 'listLocalDeliveryStatus');
    }

    /**List domain MX records by id
     *
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function listMxRecordIds()
    {
        return $this->parent->call('siteworx', '/email/remotesetup', 'listMxRecordIds');
    }

    /**
     * List MX Records for the SiteWorx account.
     *
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function listMxRecords()
    {
        return $this->parent->call('siteworx', '/email/remotesetup', 'listMxRecords');
    }

    /**
     * Change whether this box accepts email locally for a domain
     *
     * @param int $local_delivery_status
     * @param int $all_domains
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function localDelivery(int $local_delivery_status, int $all_domains = 0)
    {
        $params = [
            'local_delivery_status' => $local_delivery_status
        ];
        if($all_domains) {
            $params['all_domains'] = 1;
        }

        return $this->parent->call('siteworx', '/email/remotesetup', 'localDelivery', $params);
    }

    /**
     * Displays the information available to the action "editmx".
     *
     * @param int $record_id
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function queryEditmx(int $record_id)
    {
        $params = [
            'record_id' => $record_id
        ];

        return $this->parent->call('siteworx', '/email/remotesetup', 'queryEditmx', $params);
    }

    /**
     * Displays the information available to the action "localDelivery"
     *
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function queryLocalDelivery()
    {
        return $this->parent->call('siteworx', '/email/remotesetup', 'queryLocalDelivery');
    }

}