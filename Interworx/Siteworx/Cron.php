<?php

namespace Interworx\Siteworx;

use Interworx;

/**
 * Class Cron
 *
 * @package Interworx\Siteworx
 */
class Cron extends Interworx\WorxBase
{

    /**
     * Add a new cronjob to the user’s crontab
     *
     * @param string $script
     * @param array  $minute
     * @param array  $hour
     * @param array  $day
     * @param array  $month
     * @param array  $dayofweek
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function add(string $script, array $minute = ['*'], array $hour = ['*'], array $day = ['*'], array $month = ['*'], array $dayofweek = ['*'])
    {
        $params = ['script' => $script];

        if($minute) {
            $params['minute'] = $minute;
        }
        if($hour) {
            $params['hour'] = $hour;
        }
        if($day) {
            $params['day'] = $day;
        }
        if($month) {
            $params['month'] = $month;
        }
        if($dayofweek) {
            $params['dayofweek'] = $dayofweek;
        }

        return $this->parent->call('siteworx', '/cron', 'add', $params);
    }


    /**
     * Delete cronjobs from the SiteWorx user’s crontab
     *
     * @param array $jobs
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function delete(array $jobs)
    {
        $params = ['jobs' => $jobs];

        return $this->parent->call('siteworx', '/cron', 'delete', $params);
    }

    /**
     * Edit an existing cronjob in the user’s crontab
     *
     * @param int    $job
     * @param int    $enabled (1, 0)
     * @param string $minute
     * @param string $hour
     * @param string $day
     * @param string $month
     * @param string $dayofweek
     * @param string $script
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function edit(int $job, int $enabled = 0, string $minute = '*', string $hour = '*', string $day = '*', string $month = '*', string $dayofweek = '*', string $script = '')
    {
        $params = ['job' => $job];
        if($enabled) {
            $params['enabled'] = 1;
        }
        else {
            $params['enabled'] = 0;
        }

        if($minute) {
            $params['minute'] = $minute;
        }
        if($hour) {
            $params['hour'] = $hour;
        }
        if($day) {
            $params['day'] = $day;
        }
        if($month) {
            $params['month'] = $month;
        }
        if($dayofweek) {
            $params['dayofweek'] = $dayofweek;
        }
        if($script) {
            $params['script'] = $script;
        }

        return $this->parent->call('siteworx', '/cron', 'edit', $params);
    }

    /**
     * Get current system time in RFC822 format
     *
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function getCurrentSystemTime()
    {
        return $this->parent->call('siteworx', '/cron', 'getCurrentSystemTime');
    }

    /**
     * List cron jobs.
     *
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function list()
    {
        return $this->parent->call('siteworx', '/cron', 'list');
    }

    /**
     * Edit cron options
     *
     * @param string $shell (/bin/sh, /bin/bash, /sbin/nologin, /bin/dash, /usr/sbin/jk_chrootsh)
     * @param array  $path  (["\/opt\/remi\/php71\/root\/usr\/bin","\/opt\/remi\/php71\/root\/usr\/sbin","\/usr\/local\/bin","\/usr\/bin","\/bin"])
     * @param string $mailto
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function options(string $shell = '', array $path = [], string $mailto = '')
    {
        $params = ['shell' => $shell];
        if($path) {
            $params['path'] = $path;
        }
        if($mailto) {
            $params['mailto'] = $mailto;
        }

        return $this->parent->call('siteworx', '/cron', 'options', $params);
    }

    /**
     * Displays the information available to the action "edit"
     *
     * @param int $job
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function queryEdit(int $job)
    {
        $params = ['job' => $job];

        return $this->parent->call('siteworx', '/cron', 'queryEdit', $params);
    }

    /**
     * List user jobs
     *
     * @throws Interworx\InterworxException
     */
    public function queryJobs()
    {
        return $this->parent->call('siteworx', '/cron', 'queryJobs');
    }

    /**
     * Displays the information available to the action "options".
     *
     * @throws Interworx\InterworxException
     */
    public function queryOptions()
    {
        return $this->parent->call('siteworx', '/cron', 'queryOptions');
    }


}