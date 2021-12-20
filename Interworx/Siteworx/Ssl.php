<?php

namespace Interworx\Siteworx;

use Interworx;

/**
 * Trait Ssl
 *
 * @package Siteworx
 */
class Ssl extends Interworx\WorxBase
{
    /**
     * @return Ssl\Key
     */
    public function Key()
    {
        return new Ssl\Key($this->parent);
    }

    /**
     * @return Ssl\Chain
     */
    public function Chain()
    {
        return new Ssl\Chain($this->parent);
    }

    /**
     * @return Ssl\Crt
     */
    public function Crt()
    {
        return new Ssl\Crt($this->parent);
    }

    /**
     * @return Ssl\Csr
     */
    public function Csr()
    {
        return new Ssl\Csr($this->parent);
    }

    /**
     * Generates SSL certs via LetsEncrypt.
     *
     * @param string $domain
     * @param string $commonName
     * @param array  $subjectAltName List alternative domain names you wish to associate with this certificate
     * @param string $emailAddress   Used for urgent notices and lost key recovery
     * @param string $mode           staging, live
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function generateLetsEncrypt(string $domain, string $commonName, array $subjectAltName = [], string $emailAddress = '', string $mode = 'live')
    {
        $params = [
            'domain'     => $domain, //Example Values: example.com, secondary.com
            'commonName' => $commonName //For example, a Common Name of ’*.domain.com’
        ];
        if($subjectAltName) {
            $params['subjectAltName'] = $subjectAltName;
        }
        if($emailAddress) {
            $params['emailAddress'] = $emailAddress;
        }
        if($mode) {
            $params['mode'] = $mode;
        }

        return $this->parent->call('siteworx', '/ssl', 'generateLetsEncrypt', $params);
    }

    /**
     * Generates SSL certs via LetsEncrypt.
     *
     * @param string $domain
     * @param string $commonName
     * @param array  $subjectAltName List alternative domain names you wish to associate with this certificate
     * @param string $emailAddress   Used for urgent notices and lost key recovery
     * @param string $mode
     * @return mixed
     * @throws Interworx\InterworxException
     */
    public function generate(string $domain, string $commonName, array $subjectAltName = [], string $emailAddress = '', string $mode = '')
    {
        return $this->generateLetsEncrypt($domain, $commonName, $subjectAltName, $emailAddress, $mode);
    }

}