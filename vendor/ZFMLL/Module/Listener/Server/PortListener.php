<?php

/*
 * This file is part of the ZFMLL package.
 * @copyright Copyright (c) 2012 Blanchon Vincent - France (http://developpeur-zend-framework.fr - blanchon.vincent@gmail.com)
 */

namespace ZFMLL\Module\Listener\Server;

class PortListener extends AbstractListener
{
	/**
     * Lister name
     * @var string
     */
    protected $name = 'port';
	
    /**
     * 
     * @param string $moduleName
     * @return boolean 
     */
    public function authorizeModule($moduleName)
    {
        return $this->getRequest()->server()->get('SERVER_PORT') == $this->config;
    }
}
