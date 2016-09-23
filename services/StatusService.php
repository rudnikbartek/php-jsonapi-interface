<?php
/**
 * Created by PhpStorm.
 * User: rudni
 * Date: 30.11.2015
 * Time: 22:41
 */

namespace Rdnk\JsonApi;


use Rdnk\JsonApi\Connectors\Connector;

/**
 * Class StatusService
 * @package Rdnk\JsonApi
 */
class StatusService extends Service
{
    public $status_repository;

    /**
     * StatusService constructor.
     * DI [You should inject here configured Connector object]
     * @param Connector $connector
     */
    public function __construct(Connector $connector)
    {
        $this->status_repository = new StatusRepository($connector);
    }

    /**
     * @return StatusResponse
     */
    public function getSystemStatus(StatusRequest $statusRequest) {
        return $this->status_repository->getSystemStatus($statusRequest);
    }
}