<?php
namespace Rdnk\JsonApi\Adapters\Exceptions;
/**
 * Created by PhpStorm.
 * User: rudni
 * Date: 31.03.2016
 * Time: 01:17
 */


class NoClassNameException extends \Exception {
    public $message = 'There was no class name in json decoded array';
}

class IncorrectParamException extends \Exception {
    public function __construct($param)
    {
        parent::__construct($this->message.$param.']');
    }

    public $message = 'There was used incorrect param in json with class name. This class hasnt this param. PARAM [';
}