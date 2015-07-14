<?php namespace HelloFresh\Controllers;

use Respect\Validation\Validator as v;

class SearchController extends BaseController
{

    protected $user;

    public function construct()
    {
        $this->user = $this->di->get('HelloFresh\Contracts\UserInterface');

    }

    public function getSearch()
    {
        $data = $this->_configure();
        $this->getView()->render('search', $data);
    }

    public function postSearch()
    {
        $error_messages = array();

        try {

            if (!$this->validateCSRFToken()) {

                array_push($error_messages, 'Search Query Failed. Session Expired.');
                header('Location: /search?error=true');
                exit();
            } else {

                $q = $_POST['search'];

                $errors = false;
                if (!v::notEmpty()->validate($q)) {
                    array_push($error_messages, 'Invalid Search Query');
                    $errors=true;
                }

                $this->session->set('error_messages', $error_messages);

                if ($errors) {
                    header("Location: /register?error=true&search={$q}");
                    exit();
                }

                $users = $this->user->search($q);

                if ($users) {
                    $data = $this->_configure();
                    $data['users'] = $users;
                    $this->getView()->render('search', $data);
                    exit();
                } else {
                    array_push($error_messages, 'Search Query Failed. Please check the information you entered.');
                    header("Location: /search?error=true&search={$q}");
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
}