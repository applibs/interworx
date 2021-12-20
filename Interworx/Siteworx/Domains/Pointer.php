<?php

namespace Interworx\Siteworx\Domains;

use Interworx;

/**
 * Class Pointer
 *
 * @package Interworx\Siteworx\Domains
 */
class Pointer extends Interworx\WorxBase
{

    /**
     * Add a pointer domain
     *
     * @param string $domain
     * @param string $redir_type
     * @param string $points_to
     * @param int    $create_mail_alias
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function add(string $domain, string $redir_type = '', string $points_to = '', int $create_mail_alias = 0)
    {
        $params = [
            'domain' => $domain
        ];
        if($redir_type) {
            $params['redir_type'] = $redir_type;
        }
        if($points_to) {
            $params['points_to'] = $points_to;
        }
        if($create_mail_alias) {
            $params['create_mail_alias'] = $create_mail_alias;
        }

        return $this->parent->call('siteworx', '/domains/pointer', 'add', $params);
    }

    /**
     * Add a pointer domain for mail
     *
     * @param string $pointer_domain
     * @param int    $cascade_to_nodes
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function addMailPointerDomain(string $pointer_domain, int $cascade_to_nodes = 0)
    {
        $params = [
            'pointer_domain' => $pointer_domain
        ];
        if($cascade_to_nodes) {
            $params['cascade_to_nodes'] = 1;
        }

        return $this->parent->call('siteworx', '/domains/pointer', 'addMailPointerDomain', $params);
    }

    /**
     * Delete a pointer domain.
     *
     * @param string $domain
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function delete(string $domain)
    {
        $params = [
            'domain' => $domain
        ];

        return $this->parent->call('siteworx', '/domains/pointer', 'delete', $params);
    }

    /**
     * Delete a pointer domain for mail.
     *
     * @param string $pointer_domain
     * @param int    $cascade_to_nodes
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function deleteMailPointer(string $pointer_domain, int $cascade_to_nodes = 0)
    {
        $params = [
            'pointer_domain' => $pointer_domain
        ];
        if($cascade_to_nodes) {
            $params['cascade_to_nodes'] = 1;
        }

        return $this->parent->call('siteworx', '/domains/pointer', 'deleteMailPointer', $params);
    }

    /**
     * @deprecated
     */
    public function list()
    {
    }

    /**
     * List pointer domains
     *
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function listPointerDomains()
    {
        return $this->parent->call('siteworx', '/domains/pointer', 'listPointerDomains');
    }


}