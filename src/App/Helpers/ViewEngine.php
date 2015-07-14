<?php namespace HelloFresh\Helpers;

use HelloFresh\Contracts\ViewInterface;

/**
 * Simple view loader
 *
 * Class ViewEngine
 * @package HelloFresh\Helpers
 */
class ViewEngine implements ViewInterface {

    protected $templates;
    protected $partials;

    public function __construct()
    {
       $this->templates = __DIR__.'/../views/';
       $this->partials = __DIR__.'/../views/partials/';
    }

    /**
     * @param $file
     * @param $data
     * @return mixed
     */
    public function render($file, $data = array())
    {

        return include_once $this->templates . $file.".php";
    }

    /**
     * Render partials
     * @param $file
     * @param $data
     * @return mixed
     */
    public function partial($file, $data = array())
    {
        return include_once $this->partials . $file.".php";
    }
}