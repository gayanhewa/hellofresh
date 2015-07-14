<?php namespace HelloFresh\Repo;

use HelloFresh\Contracts\SessionInterface;
use HelloFresh\Contracts\UserInterface;
use HelloFresh\Models\User;


/**
 * Class UserRepository , where the heavy work is done.
 * @package HelloFresh\Repo
 */
class UserRepository implements UserInterface
{
    protected $session;

    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }

    /**
     * @return mixed
     */
    public function all()
    {
        return User::find_many();
    }

    /**
     * @param $id
     * @return mixed
     */
    public function get($id)
    {
        return User::find_one(1);
    }

    /**
     * @param $q
     * @return mixed
     */
    public function search($q)
    {
        $users = User::where_any_is(array(
            array('email'=> "%{$q}%"),
            array('name'=> "%{$q}%")
        ), 'LIKE')->find_many();

        return $users;
    }

    /**
     * @param $user
     * @return mixed
     */
    public function register($user)
    {
        $new_user = User::create();

        $new_user->email = $user['email'];
        $new_user->name = $user['name'];
        $new_user->password = md5($user['password']);
        $new_user->save();

        $this->session->set('auth_user', $new_user);

        return $new_user;
    }

    /**
     * @param $email
     * @param $password
     * @return mixed
     */
    public function authenticate($email, $password)
    {
        $user = User::where_equal('email', $email)
                     ->where_equal('password', md5($password))
                     ->find_one();


        if ( $user != false) {
            $this->session->set('auth_user', $user);
        }

        return $user;
    }
}