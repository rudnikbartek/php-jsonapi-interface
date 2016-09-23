<?php
/**
 * Created by PhpStorm.
 * User: rudni
 * Date: 30.11.2015
 * Time: 22:39
 */
namespace Rdnk\JsonApi;

/**
 * Class ClientsGetRequest
 * @package Rdnk\JsonApi
 */
class ClientsGetRequest extends Request {

    /**
     * int date 'Ymd'
     * if null all clients will be returned
     * if not null all clients that are modified or created after specified date will be returned
     * @var int
     */
    public $modified_after_date = null;

}


