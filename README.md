# Customlog
Magento module to log data into database and can be configured to automatically delete old entries. Multiple logs and log levels can be used, and different colors are used for different log levels in the view page.

You can log data using
```php
use Pxn_Customlog_Model_Customlog as Customlog;

Customlog::log (Customlog::ERROR, 'Log new error', 'main');

// OR

Customlog::logError ('Log new error');
```
This will log a message to the **main** log with the level **ERROR**

## Log levels
You have those levels to choose from:
* ERROR
* WARN
* INFO
* DEBUG

## Add logs
You can have multiple logs. When adding a new log entry simple use the last parameter to indicate the log name.

To add a menu item to view your log, add more children to the **adminhtml.xml** file setting the name of your log as the last parameter of the URL

**Example**
```xml
<children>
		...
		<customlog_mylog translate="title" module="customlog">
				<title>View my log</title>
				<action>customlog/customlog/view/name/mylog</action>
				<sort_order>1</sort_order>
		</customlog_mylog>
</children>
```
