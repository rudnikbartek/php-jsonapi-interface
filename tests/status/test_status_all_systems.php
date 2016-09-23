<?php
/**
 * Created by PhpStorm.
 * User: rudni
 * Date: 31.03.2016
 * Time: 00:42
 */

require_once __DIR__.'/../tests_bootstrap.php';

$status_request = new \Rdnk\JsonApi\StatusRequest();

$lang = new \Rdnk\JsonApi\Lang();
$lang->lang = \Rdnk\JsonApi\Lang::LANG_DEFAULT;
$status_request->lang = $lang;

$status_service = new \Rdnk\JsonApi\StatusService($connector);
$statuses = $status_service->getSystemStatus($status_request);

var_dump($statuses);

