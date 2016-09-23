<?php
/**
 * Created by PhpStorm.
 * User: rudni
 * Date: 30.11.2015
 * Time: 22:39
 */

namespace App\Model\Api\Validators;


use App\Model\Api\Value;


/**
 * Class ValidationError
 * @package App\Model\Api\Validators
 */
class ValidationError extends Value{

    /**
     * @var string
     */
    public $message;

    // SAME AS MONOLOG MESSAGES LEVEL
    public $level;

}