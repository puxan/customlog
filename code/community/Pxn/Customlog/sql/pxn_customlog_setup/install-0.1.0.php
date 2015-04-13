<?php

$this->startSetup ();
$table = new Varien_Db_Ddl_Table();

$table->setName ($this->getTable ('customlog/customlog'));


$table->addColumn (
	'entity_id', Varien_Db_Ddl_Table::TYPE_INTEGER, 10, array(
	'auto_increment' => true,
	'unsigned' => true,
	'nullable' => false,
	'primary' => true
	)
);
$table->addColumn (
	'time', Varien_Db_Ddl_Table::TYPE_DATETIME, null, array(
	'nullable' => false,
	)
)->addIndex ('timeIdx', array('time'));

$table->addColumn (
	'name', Varien_Db_Ddl_Table::TYPE_VARCHAR, 30, array(
	'nullable' => false,
	)
)->addIndex ('nameIdx', array('name'));

$table->addColumn (
	'level', Varien_Db_Ddl_Table::TYPE_INTEGER, null, array(
	'nullable' => false,
	)
);

$table->addColumn (
	'message', Varien_Db_Ddl_Table::TYPE_TEXT, null, array(
	'nullable' => false,
	)
);

/**
 * These two important lines are often missed.
 */
$table->setOption ('type', 'InnoDB');
$table->setOption ('charset', 'utf8');

/**
 * Create the table!
 */
$this->getConnection ()->createTable ($table);

$this->endSetup ();
