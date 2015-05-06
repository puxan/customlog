<?php

use \Pxn_Customlog_Model_Customlog as Customlog;

class Pxn_Customlog_Block_Adminhtml_Renderer extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{

	public function render (Varien_Object $row)
	{
		$value = $row->getData ($this->getColumn ()->getIndex ());

		// If rendering the level
		if ($this->getColumn ()->getIndex () == 'level')
		{
			// Get the name of the level, instead of the number
			$value = Customlog::getLevelName ($value);
		}

		// Apply specific color depending on the level
		if ($row->getData ('level') == Customlog::ERROR)
		{
			return '<span style="color:red;">' . $value . '</span>';
		}
		else if ($row->getData ('level') == Customlog::WARN)
		{
			return '<span style="color:orange;">' . $value . '</span>';
		}
		else if ($row->getData ('level') == Customlog::DEBUG)
		{
			return '<span style="color:gray;">' . $value . '</span>';
		}

		return $value;
	}

}