<?php

class Pxn_Customlog_Model_Resource_Customlog_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{

	protected function _construct ()
	{
		parent::_construct ();

		$this->_init ('customlog/customlog');
	}

}
