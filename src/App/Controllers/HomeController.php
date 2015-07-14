<?php namespace HelloFresh\Controllers;

use Aura\Di\Container;
use Aura\Di\Factory;

class HomeController extends BaseController
{

    public function index()
    {
        $data = $this->_configure();
        $this->getView()->render('home', $data);
    }

}