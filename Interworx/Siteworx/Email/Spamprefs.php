<?php

namespace Interworx\Siteworx\Email;

use Interworx;

/**
 * Class Spamprefs
 *
 * @package Interworx\Siteworx\Email
 */
class Spamprefs extends Interworx\WorxBase
{

    /**
     * Add advanced spamassassin configuration options
     *
     * @param string $preference (add_header, all_spam_to,...)
     * @param string $value
     * @param string $type       (domain, email)
     * @param string $username1  (@~example.com, @~pointer.com)
     * @param string $username2
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function addAdvanced(string $preference, string $value, string $type, string $username1 = '', string $username2 = '')
    {
        $params = [
            'preference' => $preference,
            'value'      => $value,
            'type'       => $type
        ];
        if($username1) {
            $params['username1'] = $username1;
        }
        if($username2) {
            $params['username2'] = $username2;
        }

        return $this->parent->call('siteworx', '/email/spamprefs', 'addAdvanced', $params);
    }

    /**
     * Delete advanced spamassassin configuration options
     *
     * @param array $pref_id
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function deleteAdvanced(array $pref_id)
    {
        $params = [
            'pref_id' => $pref_id
        ];

        return $this->parent->call('siteworx', '/email/spamprefs', 'deleteAdvanced', $params);
    }

    /**
     * Edit spamassassin configuration settings
     *
     * @param int    $enable_spam (0,1)
     * @param string $drozipore
     * @param int    $spamscore   (5, 7, 10)
     * @param string $rewrite_subject
     * @param int    $report_safe (0, 1, 2)
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function edit(int $enable_spam, string $drozipore, int $spamscore, string $rewrite_subject, int $report_safe)
    {
        $params = [
            'enable_spam'     => $enable_spam,
            'drozipore'       => $drozipore,
            'spamscore'       => $spamscore,
            'rewrite_subject' => $rewrite_subject,
            'report_safe'     => $report_safe
        ];

        return $this->parent->call('siteworx', '/email/spamprefs', 'edit', $params);
    }

    /**
     * Edit advanced spamassassin configuration options.
     *
     * @param int    $pref_id
     * @param string $value
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function editAdvanced(int $pref_id, string $value = '')
    {
        $params = [
            'pref_id' => $pref_id
        ];
        if($value) {
            $params['value'] = $value;
        }

        return $this->parent->call('siteworx', '/email/spamprefs', 'editAdvanced', $params);
    }

    /**
     * Lists information about global spam preferences
     *
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function listGlobalPreferences()
    {
        return $this->parent->call('siteworx', '/email/spamprefs', 'listGlobalPreferences');
    }

    /**
     * Lists information about current spam preferences.
     *
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function listPreferences()
    {
        return $this->parent->call('siteworx', '/email/spamprefs', 'listPreferences');
    }

    /**
     * List e-mail spam preferences by id
     *
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function listSpamPreferenceIds()
    {
        return $this->parent->call('siteworx', '/email/spamprefs', 'listSpamPreferenceIds');
    }

    /**
     * Displays the information available to the action "edit".
     *
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function queryEdit()
    {
        return $this->parent->call('siteworx', '/email/spamprefs', 'queryEdit');
    }

    /**
     * Displays the information available to the action "editAdvanced".
     *
     * @param int $pref_id
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function queryEditAdvanced(int $pref_id)
    {
        $params = [
            'pref_id' => $pref_id
        ];

        return $this->parent->call('siteworx', '/email/spamprefs', 'queryEditAdvanced', $params);
    }


}