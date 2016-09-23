<?php
/**
 * Created by PhpStorm.
 * User: rudni
 * Date: 31.03.2016
 * Time: 00:42
 */

require_once __DIR__.'/../tests_bootstrap.php';

$request = new \Rdnk\JsonApi\ClientDeleteRequest();

$lang = new \Rdnk\JsonApi\Lang();
$lang->lang = \Rdnk\JsonApi\Lang::LANG_DEFAULT;
$request->lang = $lang;

$request->client_number = 12345;

$service = new \Rdnk\JsonApi\ClientService($connector);
$response = $service->deleteClient($request);

var_dump($response);

