<?php

namespace Interworx\Siteworx;

use Interworx;

/**
 * Class Backup
 *
 * @package Interworx\Siteworx
 */
class Backup extends Interworx\WorxBase
{

    /**
     * @return Backup\Schedule
     */
    public function Schedule()
    {
        return new Backup\Schedule($this->parent);
    }

    /**
     * Create a SiteWorx backup
     *
     * @param string $type               (full, partial, structure)
     * @param string $location           (siteworx, local, ftp, scp)
     * @param string $email_address
     * @param string $domain_options     (single-domain, multi-domain)
     * @param array  $exclude_extensions (Examples: .zip, .tar.gz, etc)
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function create(string $type, string $location, string $email_address = '', string $domain_options = '', array $exclude_extensions = [])
    {
        $params = [
            'type'     => $type,
            'location' => $location
        ];
        if($email_address) {
            $params['email_address'] = $email_address;
        }
        if($domain_options) {
            $params['domain_options'] = $domain_options;
        }
        if($exclude_extensions) {
            $params['exclude_extensions'] = $exclude_extensions;
        }

        return $this->parent->call('siteworx', '/backup', 'create', $params);
    }

    /**
     * Delete a siteworx backup
     *
     * @param array $backups (example.com+partial-Jul.11.2018-15.29.49.tgz)
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function delete(array $backups)
    {
        $params = ['backups' => $backups];

        return $this->parent->call('siteworx', '/backup', 'delete', $params);
    }

    /**
     * List all backups created manually
     *
     * @throws Interworx\InterworxException
     */
    public function listAllBackups()
    {
        return $this->parent->call('siteworx', '/backup', 'listAllBackups');
    }

    /**
     * List all current daily backups
     *
     * @throws Interworx\InterworxException
     */
    public function listDailyBackups()
    {
        return $this->parent->call('siteworx', '/backup', 'listDailyBackups');
    }

    /**
     * List all current monthly backups.
     *
     * @throws Interworx\InterworxException
     */
    public function listMonthlyBackups()
    {
        return $this->parent->call('siteworx', '/backup', 'listMonthlyBackups');
    }

    /**
     * List all current weekly backups
     *
     * @throws Interworx\InterworxException
     */
    public function listWeeklyBackups()
    {
        return $this->parent->call('siteworx', '/backup', 'listWeeklyBackups');
    }

    /**
     * Restore a partial siteworx backup
     *
     * @param string $filetype (local, remote)
     * @param string $file
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function restore(string $filetype,string $file)
    {
        $params = ['filetype' => $filetype, 'file' => $file];

        return $this->parent->call('siteworx', '/backup', 'restore', $params);
    }


}