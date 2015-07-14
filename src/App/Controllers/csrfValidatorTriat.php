<?php namespace HelloFresh\Controllers;

/**
 * Common methods for the csrf validation , to be shared across the controllers.
 * Triat csrfValidatorTriat
 * @package HelloFresh\Controllers
 */
trait csrfValidatorTriat
{
    public function validateCSRFToken()
    {
        $token_age = time() - $_SESSION['token_time'];
        if ($token_age <= 300 && ($_POST['token'] === $_SESSION['token'])) {
            return true;
        }

        return false;
    }

    public function generateCSRFToken()
    {
        $_SESSION['token'] = $token = md5(uniqid(rand(), TRUE));
        $_SESSION['token_time'] = time();

        return $token;
    }
}