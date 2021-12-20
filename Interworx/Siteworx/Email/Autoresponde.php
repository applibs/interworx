<?php

namespace Interworx\Siteworx\Email;

use Interworx;

/**
 * Class Autoresponde
 *
 * @package Interworx\Siteworx\Email
 */
class Autoresponde extends Interworx\WorxBase
{

    /**
     * Add an e-mail autoresponder.
     *
     * @param string $username
     * @param string $autorespondmessage
     * @param array  $copyto
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function add(string $username, string $autorespondmessage, array $copyto = [])
    {
        $params = [
            'username'           => $username,
            'autorespondmessage' => $autorespondmessage
        ];
        if($copyto) {
            $params['copyto'] = $copyto;
        }

        return $this->parent->call('siteworx', '/email/autoresponde', 'add', $params);
    }

    /**
     * Delete an e-mail autoresponder
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

        return $this->parent->call('siteworx', '/email/autoresponde', 'delete', $params);
    }

    /**
     * Edit an e-mail autoresponder.
     *
     * @param string $username
     * @param string $autorespondmessage
     * @param array  $copyto
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function edit(string $username, string $autorespondmessage, array $copyto = [])
    {
        $params = [
            'username'           => $username,
            'autorespondmessage' => $autorespondmessage
        ];
        if($copyto) {
            $params['copyto'] = $copyto;
        }

        return $this->parent->call('siteworx', '/email/autoresponde', 'edit', $params);
    }

    /**
     * List e-mail autoresponders.
     *
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function listEmailAutoresponders()
    {
        return $this->parent->call('siteworx', '/email/autoresponde', 'listEmailAutoresponders');
    }

}