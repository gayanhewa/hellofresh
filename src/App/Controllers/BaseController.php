<?php namespace HelloFresh\Controllers;

use Aura\Di\Container;
use Aura\Di\Factory;
use HelloFresh\Contracts\SessionInterface;
use HelloFresh\Contracts\ViewInterface;
use Hoa\Dispatcher\Kit as Kit;

class BaseController extends Kit
{
    use csrfValidatorTriat;

    protected $di;
    private $custom_view;
    protected $session;

    public function __construct()
    {
        $this->di = $_SESSION['di'];
        $this->session = $this->di->get('HelloFresh\Helpers\SessionInterface');
        $this->custom_view = $this->di->get('HelloFresh\Contracts\ViewInterface');
    }

    public function getView()
    {
        return $this->custom_view;
    }

    /**
     * @param $data
     * @return mixed
     */
    protected function _configure($data = array())
    {
        $data['error_messages'] = array();
        // Set the error messages
        if (isset($_GET['error']) && ($_GET['error'] == 'true' || $_GET['error'] === true)) {
            $data['error_messages'] = $this->session->has('error_messages') ? $this->session->get('error_messages') : array();
        }

        $this->session->set('error_messages', array());

        $data['user'] = $this->session->has('auth_user') ? $this->session->get('auth_user'): false;

        $data['token'] = $this->generateCSRFToken();
        $data['view.partials'] = $this->getView();
        return $data;
    }
}