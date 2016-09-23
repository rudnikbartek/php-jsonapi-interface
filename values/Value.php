<?php
/**
 * Created by PhpStorm.
 * User: rudni
 * Date: 30.11.2015
 * Time: 22:52
 */

namespace Rdnk\JsonApi;

class Value {

    public function toArray($with_class_name = false) {
        $vars = get_object_vars($this);
        $return = array();
        foreach($vars as $var_name => $var_value) {
            if(is_object($var_value)) {
                $return[$var_name] = $var_value->toArray($with_class_name);
            } else if(is_array($var_value)) {
                foreach ($var_value as $var_value_item) {
                    if(is_object($var_value_item)) {
                        $return[$var_name][] = $var_value_item->toArray($with_class_name);
                    } else {
                        $return[$var_name][] = $var_value_item;
                    }
                }
            } else {
                $return[$var_name] = $var_value;
            }
        }
        $return['class_name'] = get_class($this);
        return $return;
    }

    static function get_class_constants()
    {
        $reflect = new \ReflectionClass(static::class);
        return $reflect->getConstants();
    }

}