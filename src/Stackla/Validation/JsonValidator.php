<?php

namespace Stackla\Validation;

/**
 * Class JsonValidator
 *
 * @package Stackla\Validation
 */
class JsonValidator
{

    /**
     * Helper method for validating if string provided is a valid json.
     *
     * @param string $string String representation of Json object
     * @param bool $silent Flag to not throw \InvalidArgumentException
     * @return bool
     */
    public static function validate($string, $silent = false)
    {
        if (intval($string) !== 0) return false;
        @json_decode($string);
        if (json_last_error() != JSON_ERROR_NONE) {
            if ($silent == false) {
                //Throw an Exception for string or array
                throw new \InvalidArgumentException("Invalid JSON String");
            }
            return false;
        }
        return true;
    }
}
