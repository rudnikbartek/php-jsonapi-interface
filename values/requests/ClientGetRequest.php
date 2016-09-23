<?php
/**
 * Created by PhpStorm.
 * User: rudni
 * Date: 30.11.2015
 * Time: 22:39
 */
namespace Rdnk\JsonApi;

class ClientGetRequest extends Request {
    /**
     * Client token
     * [optional]
     * @var string
     */
    public $client_token = '';

    /**
     * Client number
     * @var string
     */
    public $client_number = '';
}


