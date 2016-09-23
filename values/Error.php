<?php
/**
 * Created by PhpStorm.
 * User: rudni
 * Date: 30.11.2015
 * Time: 22:39
 */
namespace Rdnk\JsonApi;

class Error extends Message {
    CONST TYPE_FATAL = 'fatal';
    CONST TYPE_WARNING = 'warning';
    CONST TYPE_NOTICE = 'notice';

    public $error_type;
}