<?php
/**
 * Created by PhpStorm.
 * User: rudni
 * Date: 31.03.2016
 * Time: 00:00
 */
namespace Rdnk\JsonApi\Connectors;

use Rdnk\JsonApi\Value;

/**
 * Interface Connector
 * @package Rdnk\JsonApi\Connectors
 */
interface Connector
{
    /**
     * Sent Request query object and get Response object
     * Read more in documentation about what kind of objects can be provided
     * @param Value $value
     * @return Value
     */
    public function sentQuery(Value $value);

    /**
     * Set if auth should be used
     * 0 - mean not use
     * 1 - mean use
     * @param int $use
     */
    public function useAuth($use = 1);

    /**
     * Set Login to your Master system
     * @param string $login
     */
    public function setLogin($login);

    /**
     * Set password to your Master system
     * @param string $password
     */
    public function setPassword($password);

    /**
     * Set your host url endpoint
     * @param string $host_url
     */
    public function setHostUrl($host_url);
}