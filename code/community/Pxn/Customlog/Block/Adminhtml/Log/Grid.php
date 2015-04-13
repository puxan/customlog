<?php

class Pxn_Customlog_Block_Adminhtml_Log_Grid extends Mage_Adminhtml_Block_Widget_Grid
{

	/**
	 * Get entries of the selected log
	 */
	protected function _prepareCollection ()
	{
		$collection = Mage::getModel ('customlog/customlog')->getCollection ()->addFilter ('name', $this->getRequest ()->getParam ('name'));
		$this->setCollection ($collection);

		parent::_prepareCollection ();

		return $this;
	}

	/**
	 * Define table columns
	 */
	protected function _prepareColumns ()
	{
		$this->addColumn ('entity_id', array(
			'header' => $this->_getHelper ()->__ ('ID'),
			'type' => 'number',
			'width' => '100px',
			'index' => 'entity_id',
			'renderer' => 'Pxn_Customlog_Block_Adminhtml_Renderer',
		));

		$this->addColumn ('time', array(
			'header' => $this->_getHelper ()->__ ('Time'),
			'type' => 'datetime',
			'width' => '100px',
			'index' => 'time',
			'renderer' => 'Pxn_Customlog_Block_Adminhtml_Renderer',
		));

		$this->addColumn ('level', array(
			'header' => $this->_getHelper ()->__ ('Level'),
			'type' => 'text',
			'width' => '100px',
			'align' => 'center',
			'index' => 'level',
			'renderer' => 'Pxn_Customlog_Block_Adminhtml_Renderer',
		));

		$this->addColumn ('message', array(
			'header' => $this->_getHelper ()->__ ('Message'),
			'type' => 'text',
			'index' => 'message',
			'renderer' => 'Pxn_Customlog_Block_Adminhtml_Renderer',
		));

		return parent::_prepareColumns ();
	}

	protected function _getHelper ()
	{
		return Mage::helper ('customlog');
	}

}
