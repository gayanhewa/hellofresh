<?php namespace HelloFresh\Contracts;

interface SessionInterface {

    /**
     * @param $key
     * @param $value
     * @return mixed
     */
    public function set($key, $value);

    /**
     * @param $key
     * @param $default
     * @return mixed
     */
    public function get($key, $default);

    /**
     * @param $key
     * @return mixed
     */
    public function has($key);
}