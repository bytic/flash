<?php

use Nip\Container\Container;

/**
 * @param $name
 * @return mixed|null
 */
function flash_get($name)
{
    return flashData()->get($name);
}

/**
 * @param $name
 * @param $value
 */
function flash_add($name, $value)
{
    flashData()->add($name, $value);
}

/**
 * @return \Nip\FlashData\FlashData
 */
function flashData()
{
    if (function_exists('app')) {
        $container = app();
    } else {
        $container = Container::getInstance();
    }
    if ($container->has('flash.data') === false) {
        throw new Exception("Flash Provider not registered");
    }
    return $container->get('flash.data');
}

/**
 * @param $name
 * @param $message
 */
function flash_success($name, $message)
{
    flashMessages()->add($name, 'success', $message);
}

/**
 * @param $name
 * @param $message
 */
function flash_error($name, $message)
{
    flashMessages()->add($name, 'error', $message);
}

/**
 * @param $name
 * @param $message
 */
function flash_info($name, $message)
{
    flashMessages()->add($name, 'info', $message);
}

/**
 * @return \Nip\FlashData\FlashMessages
 */
function flashMessages()
{
    if (function_exists('app')) {
        $container = app();
    } else {
        $container = Container::getInstance();
    }
    if ($container->has('flash.data') === false) {
        throw new Exception("Flash Provider not registered");
    }
    return $container->get('flash.messages');
}
