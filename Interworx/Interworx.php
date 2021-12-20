<?php

namespace Interworx;

use SoapClient;

spl_autoload_register(static function ($class) {
    $classes = ['Nodeworx', 'Siteworx', 'Interworx'];
    foreach($classes as $item) {
        if(strpos($class, $item) !== false) {
            $path = \dirname(__DIR__).'/'.str_replace('\\', '/', $class).'.php';
            include_once $path;
            break;
        }
    }
});

/**
 * Interworx API class
 *
 * @author Stanislav Hloch
 */
class Interworx
{
	/**
	 * Library version
     * @var string
     */
    private string $version = '0.1';
	
    /**
	 * Compatible with API version.
     * @var string
     */
    private string $api_version = '5.1.52';

    /**
     * @var array
     */
    public array $errors = [];

    /**
     * @var bool
     */
    private bool $errorReturn;

    /**
     * @var SoapClient
     */
    private $_client;

    /**
     * Manage Siteworx Account
     */
    private string $_siteworxDomain;

    /**
     * @var string
     */
    private string $_ip;

    /**
     * @var string
     */
    private string $_key;

    /**
     * @var string
     */
    private string $endpoint;


    /**
     * InterworxApi constructor.
     *
     * @param string $ip
     * @param string $key Access key of the server. It can also be an active session ID.
     * @param string $siteworxDomain
     * @param bool   $errorReturn
     */
    public function __construct(string $ip, string $key, string $siteworxDomain = '', bool $errorReturn = true)
    {
        $this->_ip = $ip;
        $this->_key = $key;
        $this->_siteworxDomain = $siteworxDomain;
        $this->errorReturn = $errorReturn;
    }

    /**
     * Set the access key
     *
     * @param string $siteworx
     */
    private function _setKeys(string $siteworx = ''): void
    {
        $params = $this->_key;
        if($siteworx) {
            $params = [
                'apikey' => $this->_key,
                'domain' => $this->_siteworxDomain
            ];
        }

        $this->_key = $params;
    }

    /**
     * Connect to the SOAP server
     *
     * @return bool
     * @throws InterworxException
     */
    private function _connect()
    {
        ini_set('default_socket_timeout', 6000);

        $opts = [
            'ssl'   => [
                'verify_peer'       => false,
                'verify_peer_name'  => false,
                'allow_self_signed' => true
            ],
            'https' => [
                'timeout' => 6000,
                'header'  => [
                    'User-Agent: PHP-SOAP/7.3.14',
                    'Connection: close'
                ]
            ]
        ];

        $options = [
            'ssl_method'         => SOAP_SSL_METHOD_TLS,
            'encoding'           => 'UTF-8',
            'verifypeer'         => false,
            'verifyhost'         => false,
            'soap_version'       => SOAP_1_2,
            'trace'              => true,
            'exceptions'         => true,
            'timeout'            => 600, // not work well, use: default_socket_timeout
            'connection_timeout' => 600,
            'stream_context'     => stream_context_create($opts),
            'cache_wsdl'         => WSDL_CACHE_NONE,
            //'compression' => SOAP_COMPRESSION_ACCEPT | SOAP_COMPRESSION_GZIP | SOAP_COMPRESSION_DEFLATE | 1, //with this: Invalid XML
            'keep_alive'         => false,
        ];
        // https://tideways.com/profiler/blog/using-http-client-timeouts-in-php
        // try this: https://stackoverflow.com/questions/5170951/set-timeout-soap-client-zend-framework/17962989#17962989
        //ini_set('default_socket_timeout', -1); // no waiting for response, for testing only

        try {
            $this->_client = new SoapClient("https://$this->_ip:2443/soap?wsdl", $options);
        }
        catch(\Exception $e) {
            $this->errors[] = $e->getMessage();
        }
        catch(\Throwable $e) { // SoapClient can "Fatal Error" before it throws a SoapFault, soo by catching both errors and exceptions with Throwable is very simple error handling
            $this->errors[] = $e->getMessage();
        }
        /*catch (\SoapFault $e) {
            $this->errors[] = $e->getMessage();
        }*/
        if(!empty($this->errors)) {
            if($this->errorReturn) {
                return false;
            }
            throw new InterworxException(implode(',', $this->errors));
        }

        return true;
    }

    /**
     * Call the soap server
     *
     * @param string $endpoint   nodeworx or siteworx
     * @param string $controller The requested controller
     * @param string $action     The requested action
     * @param array  $input      Input data
     * @return mixed
     * @throws InterworxException
     */
    public function call(string $endpoint, string $controller, string $action, array $input = [])
    {
        $this->errors = [];
        if(!$this->_client && !$this->_connect()) {
            return false;
        }
        if($this->endpoint !== $endpoint) {
            $this->endpoint = $endpoint;
            if($endpoint === 'siteworx') {
                $this->_setKeys(true);
                $controller = '/siteworx'.$controller;
            }
            else {
                $this->_setKeys();
                $controller = '/nodeworx'.$controller;
            }
        }
        else {
            $controller = '/'.$this->endpoint.$controller;
        }

        try {
            ini_set('default_socket_timeout', 6000);
            $result = $this->_client->__soapCall('route', [$this->_key, $controller, $action, $input]);
        }
        catch(\SoapFault $e) {
            // handle issues returned by the web service
            $this->errors[] = $e->getMessage();

            return false;
        }
        catch(\Exception $e) {
            // handle PHP issues with the request
            $this->errors[] = $e->getMessage();

            return false;
        }
        catch(\Throwable $e) {
            // handle all
            $this->errors[] = $e->getMessage();

            return false;
        }

        return $this->parseResult($result);
    }

    /**
     * @param $result
     * @return bool|string|array|int
     * @throws InterworxException
     */
    private function parseResult($result)
    {
        $payload = false;
        if(!\is_array($result) || (\is_array($result) && (!array_key_exists('status', $result) || !array_key_exists('payload', $result)))) {
            $this->errors[] = 'Unexpected response from Hosting Server.';
        }
        else {
            $status = (int)$result['status'];
            $payload = $result['payload'];
            if($status === 401) {
                $this->errors[] = 'Failed to authenticate.';
            }
            else if($status !== 0) {
                if(empty($payload)) {
                    $this->errors[] = 'The result is empty.';
                }
                else if(\is_array($payload)) {
                    $this->errors[] = 'Failed to call the Interworx API.';
                }
                else {
                    $this->errors[] = $payload;
                }
            }
        }
        if(!empty($this->errors)) {
            if($this->errorReturn) {
                return false;
            }
            throw new InterworxException(implode(',', $this->errors));
        }
        if($payload === 'Success') {
            return true;
        }

        if(\is_array($payload)) {
            $result = [];
            foreach($payload as $key => $item) {
                if(\is_object($item)) {
                    $result[] = (array)$item;
                }
                else {
                    $result[$key] = $item;
                }
            }

            return $result;
        }

        return $payload;
    }

    /**
     * @param string $domain
     * @return Siteworx
     */
    public function Siteworx(string $domain = ''): Siteworx
    {
        if($domain) {
            $this->_siteworxDomain = $domain;
        }

        return new Siteworx($this);
    }

    /**
     * @return Nodeworx
     */
    public function Nodeworx(): Nodeworx
    {
        return new Nodeworx($this);
    }
}
