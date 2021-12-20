<?php

namespace Interworx\Siteworx\Email;

use Interworx;

/**
 * Class Alias
 *
 * @package Interworx\Siteworx\Email
 */
class Alias extends Interworx\WorxBase
{
    /**
     * Add an e-mail alias
     *
     * @param string $username
     * @param string $forwardsto
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function add(string $username, string $forwardsto)
    {
        $params = [
            'username'   => $username,
            'forwardsto' => $forwardsto
        ];

        return $this->parent->call('siteworx', '/email/alias', 'add', $params);
    }

    /**
     * Delete an e-mail alias
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

        return $this->parent->call('siteworx', '/email/alias', 'delete', $params);
    }

    /**
     * Edit an e-mail alias.
     *
     * @param string $username
     * @param string $forwardsto
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function edit(string $username, string $forwardsto)
    {
        $params = [
            'username'   => $username,
            'forwardsto' => $forwardsto
        ];

        return $this->parent->call('siteworx', '/email/alias', 'edit', $params);
    }

    /**
     * List e-mail aliases
     *
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function listEmailAliases()
    {
        return $this->parent->call('siteworx', '/email/alias', 'listEmailAliases');
    }

    /**
     * Displays the information available to the action "edit"
     *
     * @param string $username
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function queryEdit(string $username)
    {
        $params = [
            'username' => $username
        ];

        return $this->parent->call('siteworx', '/email/alias', 'queryEdit', $params);
    }

}