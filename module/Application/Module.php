<?php

namespace Application;

use Zend\Module\Manager,
    Zend\EventManager\StaticEventManager,
    Zend\Module\Consumer\AutoloaderProvider,
    Zend\Mvc\MvcEvent;

class Module implements AutoloaderProvider
{
    public function init(Manager $moduleManager)
    {
        $events = StaticEventManager::getInstance();
        $events->attach('bootstrap', MvcEvent::EVENT_BOOTSTRAP, array($this, 'initializeView'), 100);
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
        );
    }

    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
    
    public function initializeView($e)
    {
        $app          = $e->getParam('application');
        $basePath     = $app->getRequest()->getBasePath();
        $locator      = $app->getLocator();
        $renderer     = $locator->get('Zend\View\Renderer\PhpRenderer');
        $renderer->plugin('basePath')->setBasePath($basePath);
   	}
}
