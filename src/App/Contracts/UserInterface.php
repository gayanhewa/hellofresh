<?php namespace HelloFresh\Contracts;

/**
 *  Controllers depending on this interface will not get effected if we were to change the backend service from mysql to
 *  sqlite , redis etc ..
 *
 * Interface UserInterface
 * @package HelloFresh\Contracts
 */
interface UserInterface {

    /**
     * @return mixed
     */
    public function all();

    /**
     * @param $id
     * @return mixed
     */
    public function get($id);

    /**
     * @param $q
     * @return mixed
     */
    public function search($q);

    /**
     * @param $user
     * @return mixed
     */
    public function register($user);

    /**
     * @param $email
     * @param $password
     * @return mixed
     */
    public function authenticate($email, $password);
}