<?php
/**
 * Created by PhpStorm.
 * User: rudni
 * Date: 30.11.2015
 * Time: 22:42
 */

namespace Rdnk\JsonApi;


class StatusRepository extends Repository {

    /**
     * Get actual status
     * @param StatusRequest $status_request
     * @return StatusResponse
     */
    public function getSystemStatus(StatusRequest $status_request) {
        return $this->connector->sentQuery($status_request);
    }
}