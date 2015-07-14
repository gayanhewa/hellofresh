<?php namespace HelloFresh\Contracts;

interface ViewInterface {

    /**
     * Render the view
     *
     * @param $file
     * @param $data
     * @return mixed
     */
    public function render($file, $data);
}