<?php

/*
 * This file is part of the ZFMLL package.
 * @copyright Copyright (c) 2012 Blanchon Vincent - France (http://developpeur-zend-framework.fr - blanchon.vincent@gmail.com)
 */

namespace ZFMLL\Module\Listener;

use Zend\Module\ModuleEvent;

interface AuthorizeHandler
{
    /**
     * 
     * @param ModuleEvent $e
     * @return boolean 
     */
    public function authorize(ModuleEvent $e);
    
    /**
     * @param string $module
     * @return boolean 
     */
    public function authorizeModule($module);
}