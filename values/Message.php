<?php
/**
 * Created by PhpStorm.
 * User: rudni
 * Date: 30.11.2015
 * Time: 22:39
 */
namespace Rdnk\JsonApi;

class Message extends Value {

    CONST TYPE_SUCCESS = 'success';
    CONST TYPE_WARNING = 'warning';
    CONST TYPE_DANGER = 'danger';

    public $title;
    public $message_type;
    public $message;
}