<?php

class Input
{
    /**
     * Check if a given value was passed in the request
     *
     * @param string $key index to look for in request
     * @return boolean whether value exists in $_POST or $_GET
     */
    public static function has($key)
    {
        if (!empty($_REQUEST[$key])) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Get a requested value from either $_POST or $_GET
     *
     * @param string $key index to look for in index
     * @param mixed $default default value to return if key not found
     * @return mixed value passed in request
     */
    public static function get($key, $default = null)
    {
        if (!empty($_REQUEST[$key])) {
            return self::escape($_REQUEST[$key]);
        } else {
            return $default;
        }
    }

    public static function escape ($input)
    {
        return htmlspecialchars(strip_tags($input));
    }

    public static function getString($key)
    {
        $value = trim(static::get($key));

        $isString = settype($value, 'string');

        if (!isset($value)) {
            throw new Exception("$key cannot be null.");
        }

        if (!is_string($value)) {
            throw new Exception("$key must be a string.");
        }

        return $value;

    }

    public static function getNumber($key)
    {
        $value = str_replace(',', '', static::get($key));

        if (!isset($value)) {
            throw new Exception("$key cannot be null.");
        }

        if (!is_numeric($value)) {
            throw new Exception("$key must be a number.");
        }

        return $value;

    }

    public static function getDate($key, $format = 'Y-m-d')
    {
        $value = static::get($key);
        $dateObject = new DateTime($value);

        if ($dateObject) {
            $dateString = $dateObject->format($format);
            return $dateString;
        } else {
            throw new Exception("Please ensure you are inputting a valid date format: mm/dd/yyyy:");
        }
    }
    ///////////////////////////////////////////////////////////////////////////
    //                      DO NOT EDIT ANYTHING BELOW!!                     //
    // The Input class should not ever be instantiated, so we prevent the    //
    // constructor method from being called. We will be covering private     //
    // later in the curriculum.                                              //
    ///////////////////////////////////////////////////////////////////////////
    private function __construct() {}
}
