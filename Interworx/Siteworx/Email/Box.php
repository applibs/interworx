<?php

namespace Interworx\Siteworx\Email;

use Interworx;

/**
 * Class Box
 *
 * @package Interworx\Siteworx\Email
 */
class Box extends Interworx\WorxBase
{

    /**
     * Add an e-mail box
     *
     * @param string $email
     * @param string $password
     * @param int    $diskspacequota
     * @param array  $copyto
     * @param array  $groups
     * @return bool|mixed
     * @throws Interworx\InterworxException
     */
    public function add(string $email, string $password, int $diskspacequota = 999999999, array $copyto = [], array $groups = [])
    {

        $exists = $this->exists($email);

        if($exists) {
            $this->parent->errors[] = 'Email already exists.';

            return false;
        }

        $params = [
            'username'         => $email,
            'password'         => $password,
            'confirm_password' => $password,
            'diskspacequota'   => $diskspacequota
        ];
        if($copyto) {
            $params['copyto'] = $copyto;
        }
        if($groups) {
            $params['groups'] = $groups;
        }

        return $this->parent->call('siteworx', '/email/box', 'add', $params);
    }

    /**
     * Edit an e-mail box.
     *
     * @param string $email
     * @param string $password
     * @param int    $diskspacequota
     * @param array  $copyto
     * @param array  $groups
     * @return bool|mixed
     * @throws Interworx\InterworxException
     */
    public function edit(string $email, string $password, int $diskspacequota = 999999999, array $copyto = [], array $groups = [])
    {
        $exists = $this->exists($email);

        if(!$exists) {
            $this->parent->errors[] = 'Email doesn`t exists.';

            return false;
        }

        $params = [
            'username'         => $email,
            'password'         => $password,
            'confirm_password' => $password,
            'diskspacequota'   => $diskspacequota
        ];
        if($copyto) {
            $params['copyto'] = $copyto;
        }
        if($groups) {
            $params['groups'] = $groups;
        }

        return $this->parent->call('siteworx', '/email/box', 'edit', $params);
    }

    /**
     * Delete an e-mail box
     *
     * @param array $email
     * @return bool
     * @throws Interworx\InterworxException
     */
    public function delete(array $email)
    {
        $params = ['username' => $email];

        return $this->parent->call('siteworx', '/email/box', 'delete', $params);
    }

    /**
     * @param string $email
     * @return bool
     * @throws Interworx\InterworxException
     */
    public function exists(string $email)
    {
        //call listEmailBoxes
        $result = $this->listEmailBoxes();
        if($result && \is_array($result)) {
            foreach($result as $item) {
                if($item['email'] === $email) {
                    return true;
                }
            }
        }

        return false;
    }

    /**
     * List e-mail boxes (pop/imap).
     *
     * @return array
     * @throws Interworx\InterworxException
     */
    public function listEmailBoxes()
    {
        return $this->parent->call('siteworx', '/email/box', 'listEmailBoxes');
    }

}