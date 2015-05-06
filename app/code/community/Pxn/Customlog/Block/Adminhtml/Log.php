<?php

class Pxn_Customlog_Block_Adminhtml_Log extends Mage_Adminhtml_Block_Widget_Grid_Container
{

	protected function _construct ()
	{
		$this->_blockGroup = 'pxn_customlog';
		$this->_controller = 'adminhtml_log';
	}

	public function init ($logName)
	{
		$this->_removeButton ('add');
		$this->_headerText = Mage::helper ('customlog')->__ ('Log') . ': ' . $logName;
	}

}
