<?php
/**
 * Created by PhpStorm.
 * User: rudni
 * Date: 30.11.2015
 * Time: 22:39
 */
namespace Rdnk\JsonApi;

/**
 * Class Client
 * @package Rdnk\JsonApi
 */
class Client extends Value {

    /**
     * Same as reservation number
     * @var string
     */
    public $number;

    /**
     * Client token
     * @var string
     */
    public $token;

    /**
     * Client name
     * @var string
     */
    public $name;

    /**
     * Client surname
     * @var string
     */
    public $surname;

    /**
     * Post code
     * @var string
     */
    public $post_code;

    /**
     * City name
     * @var string
     */
    public $city;

    /**
     * Address
     * @var string
     */
    public $address_line;


    /**
     * Decide if client participate in tour
     * @var bool
     */
    public $is_active = false;


    /**
     * 'Ymd'
     * @var int
     */
    public $birthday;

}

