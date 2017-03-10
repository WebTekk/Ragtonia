<?php

/**
 * Check if empty.
 *
 * Check if a field is empty and not numeric.
 *
 * @param string $value Value to test
 * @return bool True if $value is empty
 */
function blank($value)
{
    // 'empty' && '!is_numeric' only returns true if a variable is empty.
    if (empty($value) && !is_numeric($value)) {
        return true;
    } else {
        return false;
    }
}

/**
 * Email check.
 *
 * Checks if an input is in the correct email format. Returns true.
 *
 * @param string $mail Mail address to check
 * @return bool True if $mail is mail
 */
function email($mail)
{
    if (filter_var($mail, FILTER_VALIDATE_EMAIL) !== false) {
        return true;
    } else {
        return false;
    }
}

/**
 * local require
 *
 * Require a File as a local variable.
 *
 * @param string $path Path to file
 * @return array $array Retruns all variables from $path
 */
function read($path)
{
    $array = require $path;
    return $array;
}
