<?php
class Pxn_Customlog_Model_Resource_Customlog extends Mage_Core_Model_Resource_Db_Abstract
{
    protected function _construct()
    {
        $this->_init('customlog/customlog', 'entity_id');
    }
}
