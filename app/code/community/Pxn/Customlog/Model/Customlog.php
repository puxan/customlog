<?php

class Pxn_Customlog_Model_Customlog extends Mage_Core_Model_Abstract
{

	const ERROR = 0;
	const WARN = 1;
	const INFO = 2;
	const DEBUG = 3;
	const TABLE = 'pxn_customlog';

	protected function _construct ()
	{
		$this->_init ('customlog/customlog');
	}

	/**
	 * Create a new log entry 
	 * 
	 * @param int $level One of the Customlog levels (ERROR | WARN | INFO | DEBUG)
	 * @param string $msg Message to log
	 * @param string $logName Name of the log
	 */
	public static function log ($level, $msg, $logName = 'main')
	{
		self::cleanOldLogs ();

		// Create new log entry
		$entry = new Pxn_Customlog_Model_Customlog ();
		$entry->time = date ('Y-m-d H:i:s');
		$entry->name = $logName;
		$entry->level = $level;
		$entry->message = $msg;
		$entry->save ();
	}

	/**
	 * Log an error
	 * 
	 * @param string $msg Message to log
	 * @param string $logName Name of the log
	 */
	public static function logError ($msg, $logName = 'main')
	{
		self::log (self::ERROR, $msg, $logName);
	}

	/**
	 * Log a warning
	 * 
	 * @param string $msg Message to log
	 * @param string $logName Name of the log
	 */
	public static function logWarn ($msg, $logName = 'main')
	{
		self::log (self::WARN, $msg, $logName);
	}

	/**
	 * Log info
	 * 
	 * @param string $msg Message to log
	 * @param string $logName Name of the log
	 */
	public static function logInfo ($msg, $logName = 'main')
	{
		self::log (self::INFO, $msg, $logName);
	}

	/**
	 * Log debug
	 * 
	 * @param string $msg Message to log
	 * @param string $logName Name of the log
	 */
	public static function logDebug ($msg, $logName = 'main')
	{
		self::log (self::DEBUG, $msg, $logName);
	}

	/**
	 * Get the name of a given log level
	 *
	 * @return string Name of the log level
	 */
	public static function getLevelName ($level)
	{
		$name = $level;

		if ($level == self::ERROR)
			$name = Mage::helper ('customlog')->__ ('ERROR');
		else if ($level == self::WARN)
			$name = Mage::helper ('customlog')->__ ('WARN');
		else if ($level == self::INFO)
			$name = Mage::helper ('customlog')->__ ('INFO');
		else if ($level == self::DEBUG)
			$name = Mage::helper ('customlog')->__ ('DEBUG');

		return $name;
	}

	/**
	 * Clean old log entries from DB
	 */
	public static function cleanOldLogs ()
	{
		// If willing to clean old entries
		$cleaning = Mage::getStoreConfig ('pxncustomlog/pxn_autocleaning/pxn_active', Mage::app ()->getStore ());
		if ($cleaning)
		{
			// Get deadline
			$days = Mage::getStoreConfig ('pxncustomlog/pxn_autocleaning/pxn_days', Mage::app ()->getStore ());
			$deadline = time () - $days * 86400;

			// Delete from DB
			$connection = Mage::getSingleton ('core/resource')->getConnection ('core_write');
			$condition = array($connection->quoteInto ('time < ?', date ('Y-m-d H:i:s', $deadline)));
			$connection->delete (self::TABLE, $condition);
		}
	}

}
