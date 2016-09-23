<?php
/**
 * Created by PhpStorm.
 * User: rudni
 * Date: 30.11.2015
 * Time: 22:39
 */

namespace App\Model\Api\Validators;


/**
 * Class Validator
 * @package App\Model\Api\Validators
 */
class Validator {


    public static $validation_rules;

    /**
     * @var ValidationError[]
     */
    public $validation_errors;


    public function __construct()
    {
        $this->validation_errors = array();
    }

    public static function isValid($object) {

    }

    public function addError($validation_error) {
        $this->validation_errors[] = $validation_error;
    }

    public static function is_int($object) {
        return is_int($object);
    }

}