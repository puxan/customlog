<?php

use \Pxn_Customlog_Model_Customlog as Customlog;

class Pxn_Customlog_CustomlogController extends Mage_Adminhtml_Controller_Action
{
	/**
	 * View logs. A parameter called "name" must be passed by GET to specify the log to view
	 */
	public function viewAction ()
	{
		// Clean old entries
		Customlog::cleanOldLogs ();

		// Output log grid
		$this->loadLayout();
        $customlogBlock = $this->getLayout()->createBlock('pxn_customlog/adminhtml_log');
        $customlogBlock->init ($this->getRequest()->getParam ('name'));
        $this->loadLayout()->_addContent($customlogBlock)->renderLayout();
        
        // Select current menu item
        $this->_setActiveMenu('customlog_menu');
	}
}
