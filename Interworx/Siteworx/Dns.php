<?php

namespace Interworx\Siteworx;

use Interworx;

/**
 * Class Dns
 *
 * @package Interworx\Siteworx
 */
class Dns extends Interworx\WorxBase
{
    /**
     * @deprecated
     */
    public function add()
    {
        return false;
    }

    /**
     * Add an A record.
     *
     * @param int    $zone_id
     * @param string $ipaddress
     * @param string $host
     * @param int    $ttl
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function addA(int $zone_id, string $ipaddress, string $host = '', int $ttl = 43200)
    {
        $params = [
            'zone_id'   => $zone_id,
            'ipaddress' => $ipaddress
        ];
        if($host) {
            $params['host'] = $host;
        }
        if($ttl) {
            $params['ttl'] = $ttl;
        }

        return $this->parent->call('siteworx', '/dns', 'addA', $params);
    }

    /**
     * Add an AAAA record.
     *
     * @param int    $zone_id
     * @param string $ipaddress
     * @param string $host
     * @param int    $ttl
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function addAAAA(int $zone_id, string $ipaddress, string $host = '', int $ttl = 43200)
    {
        $params = [
            'zone_id'   => $zone_id,
            'ipaddress' => $ipaddress
        ];
        if($host) {
            $params['host'] = $host;
        }
        if($ttl) {
            $params['ttl'] = $ttl;
        }

        return $this->parent->call('siteworx', '/dns', 'addAAAA', $params);
    }

    /**
     * Add a CAA record
     *
     * @param int    $zone_id
     * @param string $domain
     * @param int    $ttl
     * @param int    $flags
     * @param string $tag
     * @param string $issue
     * @param string $issuewild
     * @param string $iodef
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function addCAA(int $zone_id, string $domain = '', int $ttl = 43200, int $flags = 0, string $tag = '', string $issue = '', string $issuewild = '', string $iodef = '')
    {
        $params = [
            'zone_id' => $zone_id
        ];
        if($domain) {
            $params['domain'] = $domain;
        }
        if($ttl) {
            $params['ttl'] = $ttl;
        }
        if($flags) {
            $params['flags'] = $flags;
        }
        if($tag) {
            $params['tag'] = $tag;
        }
        if($issue) {
            $params['issue'] = $issue;
        }
        if($issuewild) {
            $params['issuewild'] = $issuewild;
        }
        if($iodef) {
            $params['iodef'] = $iodef;
        }

        return $this->parent->call('siteworx', '/dns', 'addCAA', $params);
    }

    /**
     * Add a CNAME record.
     *
     * @param int    $zone_id
     * @param string $alias
     * @param string $host
     * @param int    $ttl
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function addCNAME(int $zone_id, string $alias, string $host = '', int $ttl = 43200)
    {
        $params = [
            'zone_id' => $zone_id,
            'alias'   => $alias
        ];
        if($host) {
            $params['host'] = $host;
        }
        if($ttl) {
            $params['ttl'] = $ttl;
        }

        return $this->parent->call('siteworx', '/dns', 'addCNAME', $params);
    }

    /**
     * Add an MX record
     *
     * @param int    $zone_id
     * @param int    $preference ranging from 0-65535
     * @param string $mail_server
     * @param string $host
     * @param int    $ttl
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function addMX(int $zone_id, int $preference, string $mail_server, string $host = '', int $ttl = 43200)
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

        return $this->parent->call('siteworx', '/dns', 'addMX', $params);
    }

    /**
     * Add an SPF record
     *
     * @param int    $zone_id
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
    public function addSPF(int   $zone_id, string $host, int $ttl = 43200, string $spf_record_value = '', string $spf_version = '', int $use_a = 0,
                           int   $use_mx = 0, int $use_ptr = 0, int $other_servers = 0, array $mechanism_a = [], array $mechanism_mx = [],
                           array $mechanism_ip4 = [], array $mechanism_ip6 = [], array $mechanism_ptr = [], array $mechanism_exists = [],
                           array $mechanism_include = [], string $all = '', string $redirect = '', string $explanation = '')
    {
        $params = [
            'zone_id' => $zone_id,
            'host'    => $host,
            'ttl'     => $ttl
        ];
        if($spf_record_value) {
            $params['spf_record_value'] = $spf_record_value;
        }
        if($spf_version) {
            $params['spf_version'] = $spf_version;
        }
        if($use_a) {
            $params['use_a'] = $use_a;
        }
        if($use_mx) {
            $params['use_mx'] = $use_mx;
        }
        if($use_ptr) {
            $params['use_ptr'] = $use_ptr;
        }
        if($other_servers) {
            $params['other_servers'] = $other_servers;
        }
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

        return $this->parent->call('siteworx', '/dns', 'addSPF', $params);
    }

    /**
     * Add an SRV record.
     *
     * @param int    $zone_id
     * @param string $service
     * @param string $protocol
     * @param int    $priority
     * @param int    $weight
     * @param int    $port
     * @param string $target
     * @param string $domain
     * @param int    $ttl
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function addSRV(int $zone_id, string $service, string $protocol, int $priority, int $weight, int $port, string $target, string $domain = '', int $ttl = 43200)
    {
        $params = [
            'zone_id'  => $zone_id,
            'service'  => $service,
            'protocol' => $protocol,
            'priority' => $priority,
            'weight'   => $weight,
            'port'     => $port,
            'target'   => $target
        ];
        if($domain) {
            $params['domain'] = $domain;
        }
        if($ttl) {
            $params['ttl'] = $ttl;
        }

        return $this->parent->call('siteworx', '/dns', 'addSRV', $params);
    }

    /**
     * Add a TXT record
     *
     * @param int    $zone_id
     * @param string $text
     * @param string $host
     * @param int    $ttl
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function addTXT(int $zone_id, string $text, string $host = '', int $ttl = 43200)
    {
        $params['zone_id'] = $zone_id;
        if($text) {
            $params['text'] = $text;
        }
        if($host) {
            $params['host'] = $host;
        }
        if($ttl) {
            $params['ttl'] = $ttl;
        }

        return $this->parent->call('siteworx', '/dns', 'addTXT', $params);
    }

    /**
     * Delete a DNS Record.
     *
     * @param int $record_id
     * @param int $confirm_action
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function delete(int $record_id, int $confirm_action = 0)
    {
        $params['record_id'] = $record_id;
        if($confirm_action) {
            $params['confirm_action'] = $confirm_action;
        }

        return $this->parent->call('siteworx', '/dns', 'delete', $params);
    }

    /**
     * Edit an A record
     *
     * @param int    $record_id
     * @param string $ipaddress
     * @param string $host
     * @param int    $ttl
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function editA(int $record_id, string $ipaddress = '', string $host = '', int $ttl = 43200)
    {
        $params = [
            'record_id' => $record_id
        ];
        if($ipaddress) {
            $params['ipaddress'] = $ipaddress;
        }
        if($host) {
            $params['host'] = $host;
        }
        if($ttl) {
            $params['ttl'] = $ttl;
        }
        if(\count($params) > 1) {
            return $this->parent->call('siteworx', '/dns', 'editA', $params);
        }

        return true;
    }

    /**
     * Edit an AAAA record
     *
     * @param int $record_id
     * @param int $ttl
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function editAAAA(int $record_id, int $ttl = 43200)
    {
        $params = [
            'record_id' => $record_id
        ];
        if($ttl) {
            $params['ttl'] = $ttl;
        }
        if(\count($params) > 1) {
            return $this->parent->call('siteworx', '/dns', 'editAAAA', $params);
        }

        return true;
    }


    /**
     * Edit a CAA record
     *
     * @param int    $record_id
     * @param string $domain
     * @param int    $ttl
     * @param int    $flags
     * @param string $tag
     * @param string $issue
     * @param string $issuewild
     * @param string $iodef
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function editCAA(int $record_id, string $domain = '', int $ttl = 43200, int $flags = 0, string $tag = '', string $issue = '', string $issuewild = '', string $iodef = '')
    {
        $params = [
            'record_id' => $record_id
        ];
        if($domain) {
            $params['domain'] = $domain;
        }
        if($ttl) {
            $params['ttl'] = $ttl;
        }
        if($flags) {
            $params['flags'] = $flags;
        }
        if($tag) {
            $params['tag'] = $tag;
        }
        if($issue) {
            $params['issue'] = $issue;
        }
        if($issuewild) {
            $params['issuewild'] = $issuewild;
        }
        if($iodef) {
            $params['iodef'] = $iodef;
        }
        if(\count($params) > 1) {
            return $this->parent->call('siteworx', '/dns', 'editCAA', $params);
        }

        return true;
    }

    /**
     * Edit a CNAME record
     *
     * @param int    $record_id
     * @param string $alias
     * @param string $host
     * @param int    $ttl
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function editCNAME(int $record_id, string $alias = '', string $host = '', int $ttl = 4300)
    {
        $params = [
            'record_id' => $record_id
        ];
        if($alias) {
            $params['alias'] = $alias;
        }
        if($host) {
            $params['host'] = $host;
        }
        if($ttl) {
            $params['ttl'] = $ttl;
        }
        if(\count($params) > 1) {
            return $this->parent->call('siteworx', '/dns', 'editCNAME', $params);
        }

        return true;
    }

    /**
     * Edit an MX record
     *
     * @param int    $record_id
     * @param int    $preference
     * @param string $mail_server
     * @param string $host
     * @param int    $ttl
     * @return bool|mixed
     * @throws Interworx\InterworxException
     */
    public function editMX(int $record_id, int $preference = 0, string $mail_server = '', string $host = '', int $ttl = 43200)
    {
        $params = [
            'record_id' => $record_id
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
        if(\count($params) > 1) {
            return $this->parent->call('siteworx', '/dns', 'editMX', $params);
        }

        return true;

    }

    /**
     * Edit an SPF record
     *
     * @param int    $zone_id
     * @param string $host
     * @param int    $ttl
     * @param string $spf_record_value
     * @param string $spf_version
     * @param int    $use_a         values: 0,1
     * @param int    $use_mx        values: 0,1
     * @param int    $use_ptr       values: 0,1
     * @param int    $other_servers values: 0,1
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
    public function editSPF(int   $zone_id, string $host, int $ttl = 43200, string $spf_record_value = '', string $spf_version = '', int $use_a = 0,
                            int   $use_mx = 0, int $use_ptr = 0, int $other_servers = 0, array $mechanism_a = [], array $mechanism_mx = [],
                            array $mechanism_ip4 = [], array $mechanism_ip6 = [], array $mechanism_ptr = [], array $mechanism_exists = [],
                            array $mechanism_include = [], string $all = '', string $redirect = '', string $explanation = '')
    {
        $params = [
            'zone_id' => $zone_id,
            'host'    => $host,
            'ttl'     => $ttl
        ];
        if($spf_record_value) {
            $params['spf_record_value'] = $spf_record_value;
        }
        if($spf_version) {
            $params['spf_version'] = $spf_version;
        }
        if($use_a) {
            $params['use_a'] = $use_a;
        }
        if($use_mx) {
            $params['use_mx'] = $use_mx;
        }
        if($use_ptr) {
            $params['use_ptr'] = $use_ptr;
        }
        if($other_servers) {
            $params['other_servers'] = $other_servers;
        }
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

        return $this->parent->call('siteworx', '/dns', 'editSPF', $params);
    }

    /**
     * Edit an SRV record
     *
     * @param int    $record_id
     * @param string $service
     * @param string $protocol
     * @param int    $priority
     * @param int    $weight
     * @param int    $port
     * @param string $target
     * @param string $domain
     * @param int    $ttl
     * @return bool|mixed
     * @throws Interworx\InterworxException
     */
    public function editSRV(int $record_id, string $service, string $protocol, int $priority, int $weight, int $port, string $target, string $domain = '', int $ttl = 43200)
    {
        $params = [
            'record_id' => $record_id
        ];
        if($service) {
            $params['service'] = $service;
        }
        if($protocol) {
            $params['protocol'] = $protocol;
        }
        if($priority) {
            $params['priority'] = $priority;
        }
        if($weight) {
            $params['weight'] = $weight;
        }
        if($port) {
            $params['port'] = $port;
        }
        if($target) {
            $params['target'] = $target;
        }

        if($domain) {
            $params['domain'] = $domain;
        }
        if($ttl) {
            $params['ttl'] = $ttl;
        }
        if(\count($params) > 1) {
            return $this->parent->call('siteworx', '/dns', 'editSRV', $params);
        }

        return true;
    }

    /**
     * Edit a TXT record
     *
     * @param int    $record_id
     * @param string $text
     * @param string $host
     * @param int    $ttl
     * @return bool|mixed
     * @throws Interworx\InterworxException
     */
    public function editTXT(int $record_id, string $text = '', string $host = '', int $ttl = 43200)
    {
        $params['record_id'] = $record_id;
        if($text) {
            $params['text'] = $text;
        }
        if($host) {
            $params['host'] = $host;
        }
        if($ttl) {
            $params['ttl'] = $ttl;
        }
        if(\count($params) > 1) {
            return $this->parent->call('siteworx', '/dns', 'editTXT', $params);
        }

        return true;
    }

    /**
     * List Dns Zones
     *
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function listZones()
    {
        return $this->parent->call('siteworx', '/dns', 'listZones');
    }

    /**
     * List DNS Records that are part of the zone.
     *
     * @param int $zone_id
     * @param int $uni
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function queryDnsRecords(int $zone_id, int $uni = 0)
    {
        $params['zone_id'] = $zone_id;
        if($uni) {
            $params['uni'] = $uni;
        }

        return $this->parent->call('siteworx', '/dns', 'queryDnsRecords', $params);
    }

    /**
     * Displays the information available to the action "editA".
     *
     * @param int $record_id
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function queryEditA(int $record_id)
    {
        $params['record_id'] = $record_id;

        return $this->parent->call('siteworx', '/dns', 'queryEditA', $params);
    }

    /**
     * Displays the information available to the action "editAAAA"
     *
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function queryEditAAAA()
    {
        return $this->parent->call('siteworx', '/dns', 'queryEditAAAA');
    }

    /**
     * Displays the information available to the action "editCAA".
     *
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function queryEditCAA()
    {
        return $this->parent->call('siteworx', '/dns', 'queryEditCAA');
    }

    /**
     * Displays the information available to the action "editCNAME".
     *
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function queryEditCNAME()
    {
        return $this->parent->call('siteworx', '/dns', 'queryEditCNAME');
    }

    /**
     * Displays the information available to the action "editMX"
     *
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function queryEditMX()
    {
        return $this->parent->call('siteworx', '/dns', 'queryEditMX');
    }

    /**
     * Displays the information available to the action "editSPF".
     *
     * @throws Interworx\InterworxException
     */
    public function queryEditSPF()
    {
        return $this->parent->call('siteworx', '/dns', 'queryEditSPF');
    }

    /**
     * Displays the information available to the action "editSRV"
     *
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function queryEditSRV()
    {
        return $this->parent->call('siteworx', '/dns', 'queryEditSRV');
    }

    /**
     * Displays the information available to the action "editTXT".
     *
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function queryEditTXT()
    {
        return $this->parent->call('siteworx', '/dns', 'queryEditTXT');
    }

}