<?php

namespace Interworx\Siteworx\Email;

use Interworx;

/**
 * Class Filters
 *
 * @package Interworx\Siteworx\Email
 */
class Filters extends Interworx\WorxBase
{

    /**
     * Add an e-mail filter.
     *
     * @param string $filter_type (sender, subject)
     * @param string $filter
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function add(string $filter_type, string $filter)
    {
        $params = [
            'filter_type' => $filter_type,
            'filter'      => $filter
        ];

        return $this->parent->call('siteworx', '/email/filters', 'add', $params);
    }

    /**
     * Add a "from" e-mail filter
     *
     * @param string $from_filter
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function addFrom(string $from_filter)
    {
        $params = [
            'from-filter' => $from_filter
        ];

        return $this->parent->call('siteworx', '/email/filters', 'addFrom', $params);
    }

    /**
     * Add a "subject" e-mail filter
     *
     * @param string $subj_filter
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function addSubject(string $subj_filter)
    {
        $params = [
            'subj-filter' => $subj_filter
        ];

        return $this->parent->call('siteworx', '/email/filters', 'addSubject', $params);
    }

    /**
     * Delete e-mail filters
     *
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function delete()
    {
        return $this->parent->call('siteworx', '/email/filters', 'delete');
    }

    /**
     * Set the filtered e-mail behavior
     *
     * @param string $filter_action (drop, spam)
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function filterBehavior(string $filter_action)
    {
        $params = [
            'filter_action' => $filter_action
        ];

        return $this->parent->call('siteworx', '/email/filters', 'filterBehavior', $params);
    }

    /**
     * Lists information about SW mail filters
     *
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function listFilters()
    {
        return $this->parent->call('siteworx', '/email/filters', 'listFilters');
    }

    /**
     * Displays the information available to the action "filterBehavior".
     *
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function queryFilterBehavior()
    {
        return $this->parent->call('siteworx', '/email/filters', 'queryFilterBehavior');
    }

}