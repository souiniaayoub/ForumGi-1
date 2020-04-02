<?php
function validate_string($data)
{
    $flag = true;
    $data = filter_var($data, FILTER_SANITIZE_STRING);
    $data = trim($data);
    if (!ctype_alpha($data)) {
        $flag = false;
    }
    return $flag;
}
function validate_email($data)
{
    $flag = true;
    $data = filter_var($data, FILTER_SANITIZE_EMAIL);
    $data = trim($data);
    if (filter_var($data, FILTER_SANITIZE_EMAIL) == FALSE) {
        $flag = false;
    }
    return $flag;
}

function validate_num($data)
{
    $flag = true;
    $data = filter_var($data, FILTER_SANITIZE_NUMBER_INT);
    $data = trim($data);
    if (filter_var($data, FILTER_VALIDATE_INT) == FALSE) {
        $flag = false;
    }
    return $flag;
}

function validate_password($data)
{
    $flag = true;
    if ((strlen($data) < 6) || !preg_match('/[A-Z]/', $data)) {
        $flag = false;
    }
    return $flag;
}
