<?php

namespace Interworx\Siteworx\Email;

use Interworx;

/**
 * Class Group
 *
 * @package Interworx\Siteworx\Email
 */
class Group extends Interworx\WorxBase
{

    /**
     * Add an e-mail group
     *
     * @param string $username
     * @param array  $forwardsto
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function add(string $username, array $forwardsto)
    {
        $params = [
            'username'   => $username,
            'forwardsto' => $forwardsto
        ];

        return $this->parent->call('siteworx', '/email/group', 'add', $params);
    }

    /**
     * Delete an e-mail group
     *
     * @param array $username
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function delete(array $username)
    {
        $params = [
            'username' => $username
        ];

        return $this->parent->call('siteworx', '/email/group', 'delete', $params);
    }

    /**
     * Edit an e-mail group.
     *
     * @param string $username
     * @param array  $forwardsto
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function edit(string $username, array $forwardsto)
    {
        $params = [
            'username'   => $username,
            'forwardsto' => $forwardsto
        ];

        return $this->parent->call('siteworx', '/email/group', 'edit', $params);
    }

    /**
     * List e-mail groups.
     *
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function listEmailGroups()
    {
        return $this->parent->call('siteworx', '/email/group', 'listEmailGroups');
    }


}