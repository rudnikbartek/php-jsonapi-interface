<?php
/**
 * Created by PhpStorm.
 * User: rudni
 * Date: 31.03.2016
 * Time: 00:55
 */
require_once __DIR__.'/../vendor/autoload.php';

$system_login = 'your-login-here';
$system_pass = 'your-pass-here';
$system_url = 'json-api-endpoint-url';


$connector = new \Rdnk\JsonApi\Connectors\CurlConnector();

$connector->setHostUrl($system_url);
$connector->setLogin($system_login);
$connector->setPassword($system_pass);
