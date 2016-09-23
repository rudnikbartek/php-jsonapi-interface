<?php
/**
 * Created by PhpStorm.
 * User: rudni
 * Date: 30.11.2015
 * Time: 22:42
 */

namespace Rdnk\JsonApi\Connectors;

use Rdnk\JsonApi\Adapters\JsonAdapter;
use Rdnk\JsonApi\Value;

/**
 * Class CurlConnector
 * @package Rdnk\JsonApi\Connectors
 */
class CurlConnector implements Connector
{
    // INTERNAL CURL VARIABLES ---------------------------------------------------
    protected $_useragent = 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1';
    protected $_url;
    protected $_followlocation;
    protected $_timeout;
    protected $_maxRedirects;
    protected $_cookieFileLocation = './cookie.txt';
    protected $_post;
    protected $_postFields;
    protected $_referer = "//";

    protected $_session;
    protected $_response;
    protected $_includeHeader;
    protected $_noBody;
    protected $_status;
    protected $_binaryTransfer;
    // -----------------------------------------------------------------------------

    /**
     * Authentication
     * 1-use auth
     * 0-don't use auth
     * Default is ON
     * @var int
     */
    public    $authentication = 1;

    /**
     * Your login to master system
     * @var string
     */
    public    $auth_name      = '';

    /**
     * Your password to master system
     * @var string
     */
    public    $auth_pass      = '';

    /**
     * @var JsonAdapter
     */
    public $json_adapter;


    /**
     * Sent Request query object and get Response object
     * Read more in documentation about what kind of objects can be provided
     * @param Value $value
     * @return Value
     */
    public function sentQuery(Value $value) {
        $json = $this->json_adapter->convertApiObjectToJson($value);
        $this->setPost(array("JSON_DATA"=>$json));
        $this->createCurl($this->_url);
//        echo $this->_response;
//        die;
        return $this->json_adapter->convertJsonToApiObject($this->getResponse());
    }


    /**
     * Set if auth should be used
     * 0 - mean not use
     * 1 - mean use
     * @param int $use
     */
    public function useAuth($use = 1){
        $this->authentication = 0;
        if($use == true) $this->authentication = 1;
    }


    /**
     * Set Login to your Master system
     * @param string $login
     */
    public function setLogin($login){
        $this->auth_name = $login;
    }

    /**
     * Set password to your Master system
     * @param string $password
     */
    public function setPassword($password){
        $this->auth_pass = $password;
    }

    /**
     * Set your host url endpoint
     * @param string $host_url
     */
    public function setHostUrl($host_url) {
        $this->_url = $host_url;
    }

    public function __construct($followlocation = true, $timeOut = 30, $maxRedirecs = 4, $binaryTransfer = false, $includeHeader = false, $noBody = false)
    {
        $this->json_adapter = new JsonAdapter();
        
        $this->_followlocation = $followlocation;
        $this->_timeout = $timeOut;
        $this->_maxRedirects = $maxRedirecs;
        $this->_noBody = $noBody;
        $this->_includeHeader = $includeHeader;
        $this->_binaryTransfer = $binaryTransfer;
        $this->_cookieFileLocation = dirname(__FILE__).'/cookie.txt';
    }

    protected function setReferer($referer){
        $this->_referer = $referer;
    }

    protected function setCookiFileLocation($path)
    {
        $this->_cookieFileLocation = $path;
    }

    protected function setPost ($postFields)
    {
        $this->_post = true;
        $this->_postFields = $postFields;
    }

    protected function setUserAgent($userAgent)
    {
        $this->_useragent = $userAgent;
    }

    protected function createCurl($url = 'nul')
    {
        if($url != 'nul'){
            $this->_url = $url;
        }

        $s = curl_init();

        curl_setopt($s,CURLOPT_URL,$this->_url);
        curl_setopt($s,CURLOPT_HTTPHEADER,array('Expect:'));
        curl_setopt($s,CURLOPT_TIMEOUT,$this->_timeout);
        curl_setopt($s,CURLOPT_MAXREDIRS,$this->_maxRedirects);
        curl_setopt($s,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($s,CURLOPT_FOLLOWLOCATION,$this->_followlocation);
        curl_setopt($s,CURLOPT_COOKIEJAR,$this->_cookieFileLocation);
        curl_setopt($s,CURLOPT_COOKIEFILE,$this->_cookieFileLocation);

        if($this->authentication == 1){
            curl_setopt($s, CURLOPT_USERPWD, $this->auth_name.':'.$this->auth_pass);
        }
        if($this->_post)
        {
            curl_setopt($s,CURLOPT_POST,true);
            curl_setopt($s,CURLOPT_POSTFIELDS,$this->_postFields);

        }

        if($this->_includeHeader)
        {
            curl_setopt($s,CURLOPT_HEADER,true);
        }

        if($this->_noBody)
        {
            curl_setopt($s,CURLOPT_NOBODY,true);
        }
        /*
        if($this->_binary)
        {
            curl_setopt($s,CURLOPT_BINARYTRANSFER,true);
        }
        */
        curl_setopt($s,CURLOPT_USERAGENT,$this->_useragent);
        curl_setopt($s,CURLOPT_REFERER,$this->_referer);

        $this->_response = curl_exec($s);
        $this->_status = curl_getinfo($s,CURLINFO_HTTP_CODE);
        curl_close($s);

    }

    public function getHttpStatus()
    {
        return $this->_status;
    }

    public function getResponse(){
        if(is_string($this->_response)) {
            return $this->_response;
        } else {
            return '';
        }

    }
}