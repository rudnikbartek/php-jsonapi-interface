<?php
/**
 * Created by PhpStorm.
 * User: rudni
 * Date: 30.11.2015
 * Time: 22:39
 */
namespace Rdnk\JsonApi;


/**
 * Class ClientsGetResponse
 * @package Rdnk\JsonApi
 */
class ClientsGetResponse extends Response {

    /**
     * Array of clients
     * @var Client[]
     */
    public $clients;

}