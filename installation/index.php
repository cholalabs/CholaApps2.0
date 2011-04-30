<?php
/**
 * @version		$Id: index.php 20806 2011-02-21 19:44:59Z dextercowley $
 * @package		Chola.Installation
 * @copyright	Copyright (C) 2005 - 2011 Cholalabs Software LLP. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// PHP 5 check
if (version_compare(PHP_VERSION, '5.2.4', '<')) {
	die('Your host needs to use PHP 5.2.4 or higher to run Chola 1.6.');
}

/**
 * Constant that is checked in included files to prevent direct access.
 */
define('_JEXEC', 1);

/**
 * Constant that defines the base path of the installed Chola site.
 */
define('JPATH_BASE', dirname(__FILE__));

/**
 * Shortcut for the directory separator character.
 */
define('DS', DIRECTORY_SEPARATOR);

// Set path constants.
$parts = explode(DS, JPATH_BASE);
array_pop($parts);

define('JPATH_ROOT',			implode(DS, $parts));
define('JPATH_SITE',			JPATH_ROOT);
define('JPATH_CONFIGURATION',	JPATH_ROOT);
define('JPATH_ADMINISTRATOR',	JPATH_ROOT.DS.'administrator');
define('JPATH_LIBRARIES',		JPATH_ROOT.DS.'libraries');
define('JPATH_PLUGINS',			JPATH_ROOT.DS.'plugins');
define('JPATH_INSTALLATION',	JPATH_ROOT.DS.'installation');
define('JPATH_THEMES',			JPATH_BASE);
define('JPATH_CACHE',			JPATH_ROOT.DS.'cache');

/*
 * Chola system checks.
 */
error_reporting(E_ALL);
@ini_set('magic_quotes_runtime', 0);
@ini_set('zend.ze1_compatibility_mode', '0');

/*
 * Check for existing configuration file.
 */
if (file_exists(JPATH_CONFIGURATION.'/configuration.php') && (filesize(JPATH_CONFIGURATION.'/configuration.php') > 10) && !file_exists(JPATH_INSTALLATION.'/index.php')) {
	header('Location: ../index.php');
	exit();
}

/*
 * Chola system startup
 */

// Bootstrap the Chola Framework.
require_once JPATH_LIBRARIES.'/chola/import.php';

// Chola library imports.
jimport('chola.database.table');
jimport('chola.user.user');
jimport('chola.environment.uri');
jimport('chola.html.parameter');
jimport('chola.utilities.utility');
jimport('chola.language.language');
jimport('chola.utilities.string');

// Create the application object.
$app = JFactory::getApplication('installation');

// Initialise the application.
$app->initialise();

// Render the document.
$app->render();

// Return the response.
echo $app;
