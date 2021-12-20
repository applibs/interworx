<?php

namespace Interworx\Nodeworx;

use Interworx;

class Lang extends Interworx\WorxBase
{

    /**
     * @param string $lang_code
     * @param string $lang_file
     * @return bool
     * @throws Interworx\InterworxException
     */
    public function add(string $lang_code, string $lang_file)
    {
        $params = ['code' => $lang_code, 'lang_file' => $lang_file];

        return $this->parent->call('nodeworx', '/lang', 'add', $params);
    }

    /**
     * @return bool
     * @throws Interworx\InterworxException
     */
    public function changeCurrentUserLanguage()
    {
        return $this->parent->call('nodeworx', '/lang', 'changeCurrentUserLanguage');
    }

    /**
     * @param string $lang_code
     * @return bool
     * @throws Interworx\InterworxException
     */
    public function delete(string $lang_code)
    {
        $params = ['code' => $lang_code];

        return $this->parent->call('nodeworx', '/lang', 'delete', $params);
    }

    /**
     * @return array
     * @throws Interworx\InterworxException
     */
    public function listLanguages()
    {
        return $this->parent->call('nodeworx', '/lang', 'listLanguages');
    }

    /**
     * @return bool
     * @throws Interworx\InterworxException
     */
    public function queryChangeCurrentUserLanguage()
    {
        return $this->parent->call('nodeworx', '/lang', 'queryChangeCurrentUserLanguage');
    }

    /**
     * @param string $lang_code
     * @return bool
     * @throws Interworx\InterworxException
     */
    public function syncLanguage(string $lang_code)
    {
        $params = ['code' => $lang_code];

        return $this->parent->call('nodeworx', '/lang', 'syncLanguage', $params);
    }

}