<?php
/**
 * Created by PhpStorm.
 * User: rudni
 * Date: 30.11.2015
 * Time: 22:39
 */
namespace Rdnk\JsonApi\Adapters;

use Rdnk\JsonApi\Adapters\Exceptions\IncorrectParamException;
use Rdnk\JsonApi\Adapters\Exceptions\NoClassNameException;
use Rdnk\JsonApi\Value;

/**
 * Class JsonAdapter
 * @package Rdnk\JsonApi\Adapters
 */
class JsonAdapter {

    /**
     * Converts Api object (with internal object relations) to json string that can by reinterpret to Api objects
     * @param Value $value_api_object
     * @return string
     */
    public function convertApiObjectToJson(Value $value_api_object) {
        $array = $value_api_object->toArray(true);
        return json_encode($array);
    }


    /**
     * Converts Json string to Koliber Api objects
     * @param string $json_string
     * @return Value
     */
    public function convertJsonToApiObject($json_string) {

        $array = json_decode($json_string, true);

        $object = $this->convertArrayToApiObject($array);

        return $object;
    }

    /**
     * @param $array
     * @return mixed
     * @throws IncorrectParamException
     * @throws NoClassNameException
     */
    public function convertArrayToApiObject($array) {
        if(isset($array['class_name'])) {
            $class_name = $array['class_name'];
            unset($array['class_name']);
            $object = new $class_name();
            $vars = array_keys(get_object_vars($object));

            foreach ($array as $param_name => $param_value) {
                if(array_search($param_name, $vars) === false) {
                    throw new IncorrectParamException($param_name);
                } else {
                    if(isset($param_value['class_name'])) {
                        $object->$param_name = $this->convertArrayToApiObject($param_value);
                    } else if (is_array($param_value)) {
                        foreach ($param_value as $param_item) {
                            if(isset($param_item['class_name'])) {
                                $object->{$param_name}[] = $this->convertArrayToApiObject($param_item);
                            } else {
                                $object->{$param_name}[] = $param_item;
                            }
                        }
                    } else {
                        $object->$param_name = $param_value;
                    }
                }
            }

            return $object;
        } else {
            throw new NoClassNameException();
        }
    }


}

