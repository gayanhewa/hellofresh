<?php namespace HelloFresh\Controllers;

use HelloFresh\Contracts\UserInterface;
use Respect\Validation\Validator as v;

class UserController extends BaseController
{

    protected $user;

    public function construct()
    {
        $this->user = $this->di->get('HelloFresh\Contracts\UserInterface');

        if ($this->session->get('auth_user', false) != false) {
            header('Location: /search');
            exit();
        }

    }
    public function postRegister()
    {
        $error_messages = array();

        try {

            if (!$this->validateCSRFToken()) {

                array_push($error_messages, 'Registration Failed. Session Expired.');
                header('Location: /register?error=true');
                exit();
            } else {
                $email = $_POST['email'];
                $name = $_POST['name'];
                $password = $_POST['password'];
                $password_conf = $_POST['password_conf'];

                $errors = false;

                if (!v::email()->notEmpty()->validate($email)) {
                    array_push($error_messages, 'Invalid Email Format');
                    $errors=true;
                }

                if (!v::alpha()->notEmpty()->string()->validate($name)) {
                    array_push($error_messages, 'Name field is required.');
                    $errors=true;
                }
                if (!v::notEmpty()->length(6)->validate($password)) {
                    array_push($error_messages, 'Password field is required. Min : 6 Characters.');
                    $errors=true;
                }

                if (!v::notEmpty()->in([$password], true)->length(6)->validate($password_conf)) {
                    array_push($error_messages, 'Passwords don\'t match.');
                    $errors=true;
                }

                $this->session->set('error_messages', $error_messages);

                if ($errors) {
                    header("Location: /register?error=true&email={$email}&name={$name}");
                    exit();
                }

                $registered = $this->user->register(array(
                    'email'=>$email,
                    'password'=> $password,
                    'name' => $name
                ));

                if ($registered) {
                    header('Location: /search');
                    exit();
                } else {
                    array_push($error_messages, 'Registration Failed. Please check the information you entered.');
                    header("Location: /register?error=true&email={$email}&name={$name}");
                    exit();
                }
            }
        }catch(\Exception $e) {

            // Ideally we would log the exception , and handle the user experience.
            array_push($error_messages, 'Looks like something went wrong. Exception Message : '. $e->getMessage());
            header('Location: /register?error=true');
            exit();
        }
    }

    public function getRegister()
    {
        $data = $this->_configure();

        $this->getView()->render('register', $data);
    }

}