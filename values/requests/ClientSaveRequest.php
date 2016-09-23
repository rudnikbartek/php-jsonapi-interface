<?php
/**
 * Created by PhpStorm.
 * User: rudni
 * Date: 30.11.2015
 * Time: 22:39
 */
namespace Rdnk\JsonApi;

class ClientSaveRequest extends Request {

    /**
     * @var Client
     */
    public $client;

    /**
     * Determine if client should be overwritten if exists
     * (search by client number or token)
     * @var bool
     */
    public $overwrite_if_exists = true;
}


