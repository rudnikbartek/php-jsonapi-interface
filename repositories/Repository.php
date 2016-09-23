<?php
/**
 * Created by PhpStorm.
 * User: rudni
 * Date: 30.11.2015
 * Time: 22:53
 */

namespace Rdnk\JsonApi;


use Rdnk\JsonApi\Connectors\Connector;

/**
 * Class Repository
 * @package Rdnk\JsonApi
 */
class Repository {

    /** Curl Connection to MasterSystem
     * @var Connector
     */
    protected $connector;


    /**
     * StatusRepository constructor.
     * DI [You should here inject configured Connector object]
     * @param Connector $configured_connector
     */
    public function __construct(Connector $configured_connector)
    {
        $this->connector = $configured_connector;
    }

}