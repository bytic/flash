<?php

namespace Nip\FlashData;

/**
 * Class FlashData
 * @package Nip\FlashData
 */
class FlashData
{
    protected $previous = [];
    protected $next = [];
    protected $session_var = 'flash-data';

    public function __construct()
    {
        $this->read();
    }

    public function read()
    {
        $data = isset($_SESSION[$this->session_var]) ? $_SESSION[$this->session_var] : null;
        if (!is_null($data)) {
            if (is_array($data)) {
                $this->previous = $data;
            }
            unset($_SESSION[$this->session_var]);
        }
    }

    /**
     * Returns static instance.
     *
     * @return self
     */
    public static function &instance()
    {
        static $instance;
        if (!($instance instanceof self)) {
            $instance = new self();
        }

        return $instance;
    }

    public function has($var)
    {
        return isset($this->previous[trim($var)]) ? true : false;
    }

    public function get($var)
    {
        return isset($this->previous[trim($var)]) ? $this->previous[trim($var)] : null;
    }

    public function add($var, $value)
    {
        $this->next[trim($var)] = $value;
        $this->write();
    }

    protected function write()
    {
        $_SESSION[$this->session_var] = $this->next;
    }

    public function remove($var)
    {
        unset($this->next[trim($var)]);
        $this->write();
    }

    protected function clear()
    {
        $this->next = [];
    }
}
