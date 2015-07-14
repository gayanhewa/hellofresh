<?php namespace HelloFresh\Helpers;

use HelloFresh\Contracts\SessionInterface;

class Session implements SessionInterface
{
    protected $namespace = 'hellofresh:';

    /**
     * @param $key
     * @param $value
     * @return mixed
     */
    public function set($key, $value)
    {
        $_SESSION[$this->namespace.$key] = $value;
    }

    /**
     * @param $key
     * @param $default
     * @return mixed
     */
    public function get($key, $default = false)
    {
        if ($this->has($key)) {
            return $_SESSION[$this->namespace.$key];
        }

        return $default;
    }

    public function has($key)
    {
        if (isset($_SESSION[$this->namespace.$key])){
            return true;
        }

        return false;
    }

}