<?php

namespace Interworx\Siteworx\Ssl;

use Interworx;

/**
 * Class Csr
 *
 * @package Interworx\Siteworx\Ssl
 */
class Csr extends Interworx\WorxBase
{
    /**
     * Delete a SSL certificate signing request
     *
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function delete()
    {
        return $this->parent->call('siteworx', '/ssl/csr', 'delete');
    }

    /**
     * Generate a SSL certificate signing request.
     *
     * @param string $emailAddress
     * @param string $commonName             (example.com, *.com, example.*, *.example.com, ipv4.example.com, mail.example.com, ftp.example.com, sub.example.com, www.example.com)
     * @param string $organizationName       (the name of the company)
     * @param string $organizationalUnitName (the name of the company division)
     * @param string $localityName           (the name of the city in which you reside)
     * @param string $stateOrProvinceName    (the name of the state or province)
     * @param string $countryName            (the 2-letter country code )
     * @param array  $subjectAltName         (example.com, mail.example.com, ftp.example.com, sub.example.com, www.example.com)
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function generate(string $emailAddress, string $commonName, string $organizationName, string $organizationalUnitName, string $localityName, string $stateOrProvinceName, string $countryName = '', array $subjectAltName = [])
    {
        $params = [
            'emailAddress'           => $emailAddress,
            'commonName'             => $commonName,
            'organizationName'       => $organizationName,
            'organizationalUnitName' => $organizationalUnitName,
            'localityName'           => $localityName,
            'stateOrProvinceName'    => $stateOrProvinceName
        ];
        if($countryName) {
            $params['countryName'] = $countryName;
        }
        if($subjectAltName) {
            $params['subjectAltName'] = $subjectAltName;
        }

        return $this->parent->call('siteworx', '/ssl/csr', 'generate', $params);
    }

    /**
     * Get SSL CSR
     *
     * @return mixed
     * @throws Interworx\InterworxException
     * @version 6.0.11-1380
     */
    public function getSslCsr()
    {
        return $this->parent->call('siteworx', '/ssl/csr', 'getSslCsr');
    }

    /**
     * Install a SSL certificate signing request
     *
     * @param string $csr
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function install(string $csr)
    {
        $params = ['csr' => $csr];

        return $this->parent->call('siteworx', '/ssl/csr', 'install', $params);
    }

    /**
     * List domains on this account on which an SSL certificate can be installed.
     *
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function listSslDomains()
    {
        return $this->parent->call('siteworx', '/ssl/csr', 'install');
    }

}