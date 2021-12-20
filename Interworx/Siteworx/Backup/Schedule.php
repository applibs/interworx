<?php

namespace Interworx\Siteworx\Backup;

use Interworx;

/**
 * Class Schedule
 *
 * @package Interworx\Siteworx\Backup
 */
class Schedule extends Interworx\WorxBase
{

    /**
     * @param string $frequency   (weekly, monthly)
     * @param string $type        (full, partial, structure)
     * @param string $location    (siteworx, local, ftp, scp)
     * @param int    $day_of_week {0, 1, 2, 3, 4, 5, 6}
     * @param string $email_address
     * @param int    $rotate
     * @param int    $hour
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function create(string $frequency, string $type, string $location, int $day_of_week, string $email_address = '', int $rotate = 0, int $hour = 0)
    {
        $params = [
            'frequency'   => $frequency,
            'type'        => $type,
            'location'    => $location,
            'day_of_week' => $day_of_week
        ];
        if($email_address) {
            $params['email_address'] = $email_address;
        }
        if($rotate) {
            $params['rotate'] = $rotate;
        }
        if($hour) {
            $params['hour'] = $hour;
        }

        return $this->parent->call('siteworx', '/backup/schedule', 'create', $params);
    }

    /**
     * Deletes the scheduled backup.
     *
     * @param array $scheduled (Example Values: 137)
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function delete(array $scheduled)
    {
        $params = [
            'scheduled' => $scheduled
        ];

        return $this->parent->call('siteworx', '/backup/schedule', 'delete', $params);
    }

    /**
     * Edit a scheduled backup.
     *
     * @param int    $id
     * @param string $frequency
     * @param string $type
     * @param string $location
     * @param string $email_address
     * @param int    $rotate
     * @param int    $hour
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function edit(int $id, string $frequency, string $type, string $location, string $email_address = '', int $rotate = 0, int $hour = 0)
    {
        $params = [
            'frequency' => $frequency,
            'type'      => $type,
            'location'  => $location,
            'id'        => $id
        ];
        if($email_address) {
            $params['email_address'] = $email_address;
        }
        if($rotate) {
            $params['rotate'] = $rotate;
        }
        if($hour) {
            $params['hour'] = $hour;
        }

        return $this->parent->call('siteworx', '/backup/schedule', 'edit', $params);
    }

    /**
     * Lists all the scheduled backups for the current SiteWorx user.
     *
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function listScheduled()
    {
        return $this->parent->call('siteworx', '/backup/schedule', 'listScheduled');
    }

    /**
     * @param int    $id
     * @param string $frequency
     * @param string $type
     * @param string $location
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function queryEdit(int $id, string $frequency, string $type, string $location)
    {
        $params = [
            'frequency' => $frequency,
            'type'      => $type,
            'location'  => $location,
            'id'        => $id
        ];

        return $this->parent->call('siteworx', '/backup/schedule', 'queryEdit', $params);
    }


}