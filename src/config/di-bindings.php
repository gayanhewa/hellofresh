<?php

/**
 *  Service bindings
 */

$di->set('HelloFresh\Contracts\ViewInterface', $di->lazyNew('HelloFresh\Helpers\ViewEngine'));
$di->set('HelloFresh\Contracts\UserInterface', $di->lazyNew('HelloFresh\Repo\UserRepository'));
$di->set('HelloFresh\Helpers\SessionInterface', $di->lazyNew('HelloFresh\Helpers\Session'));

$di->params['HelloFresh\Repo\UserRepository']['session']= $di->lazyGet('HelloFresh\Helpers\SessionInterface');

$di->types['SessionInterface'] = $di->lazyGet('HelloFresh\Helpers\SessionInterface');

$di->setter['BaseController']['setSession'] = $di->lazyGet('HelloFresh\Helpers\SessionInterface');
$di->setter['BaseController']['setDi'] = $di;
$di->setter['BaseController']['setView'] = $di->lazyGet('HelloFresh\Contracts\ViewInterface');

// Share the container
$_SESSION['di'] = $di;