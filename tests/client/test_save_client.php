<?php
/**
 * Created by PhpStorm.
 * User: rudni
 * Date: 31.03.2016
 * Time: 00:42
 */

require_once __DIR__.'/../tests_bootstrap.php';

$request = new \Rdnk\JsonApi\ClientSaveRequest();

$lang = new \Rdnk\JsonApi\Lang();
$lang->lang = \Rdnk\JsonApi\Lang::LANG_DEFAULT;
$request->lang = $lang;

$client = new \Rdnk\JsonApi\Client();
$client->address_line = 'TESTETSWTE';
$client->number = 12345;

$request->client = $client;

$service = new \Rdnk\JsonApi\ClientService($connector);
$response = $service->saveClient($request);

var_dump($response);

