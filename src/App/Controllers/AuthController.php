<?php namespace HelloFresh\Controllers;

use Respect\Validation\Validator as v;

class AuthController extends BaseController
{
    protected $user;


    public function construct()
    {
        $this->user = $this->di->get('HelloFresh\Contracts\UserInterface');

        if ($this->session->get('auth_user') != false) {
            header('Location: /search');
        }
    }

    /**
     *  Process Login
     */
    public function postLogin()
    {

        $error_messages = array();

        try {

            if (!$this->validateCSRFToken()) {

                array_push($error_messages, 'Authentication Failed. Session Expired.');
                header('Location: /login?error=true');

            } else {
                $email = $_POST['email'];
                $password = $_POST['password'];
                $errors = false;
                if (!v::email()->notEmpty()->validate($email)) {
                    array_push($error_messages, 'Invalid Email Format');
                    $errors=true;
                }

                if (!v::notEmpty()->validate($password)) {
                    array_push($error_messages, 'Password field is required.');
                    $errors=true;
                }

                $this->session->set('error_messages', $error_messages);

                if ($errors) {
                    header("Location: /login?error=true&email={$email}");
                    exit();
                }

                $authenticated = $this->user->authenticate($email, $password);

                if ($authenticated) {
                    header('Location: /search');
                    exit();
                } else {
                    array_push($error_messages, 'Authentication Failed. Please Check your Email/Password');
                    header("Location: /login?error=true&email={$email}");
                    exit();
                }
            }
        }catch(\Exception $e) {

            // Ideally we would log the exception , and handle the user experience.
            array_push($error_messages, 'Looks like something went wrong. Exception Message : '. $e->getMessage());
            header('Location: /login?error=true');
        }
    }

    /**
     *  Render the login form
     */
    public function getLogin()
    {
        $data = $this->_configure();
        $this->getView()->render('login', $data);
    }

    public function logout()
    {
        $this->session->set('auth_user', false);
        header('Location: /login');
    }
}