<?php
/**
 * @version		$Id: framework.php 21171 2011-04-18 21:50:18Z dextercowley $
 * @package		Chola.Administrator
 * @subpackage	Application
 * @copyright	Copyright (C) 2005 - 2011 Cholalabs Software LLP. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

/*
 * Cholapps system checks.
 */

@ini_set('magic_quotes_runtime', 0);
@ini_set('zend.ze1_compatibility_mode', '0');

/*
 * Installation check, and check on removal of the install directory.
 */
if (!file_exists(JPATH_CONFIGURATION.'/configuration.php') || (filesize(JPATH_CONFIGURATION.'/configuration.php') < 10) || file_exists(JPATH_INSTALLATION.'/index.php')) {	header('Location: ../installation/index.php');
	exit();
}

/*
 * Cholapps system startup
 */

// System includes.
require_once JPATH_LIBRARIES.'/chola/import.php';

// Pre-Load configuration.
require_once JPATH_CONFIGURATION.'/configuration.php';

// System configuration.
$CONFIG = new JConfig();

if (@$CONFIG->error_reporting === 0) {
	error_reporting(0);
} else if (@$CONFIG->error_reporting > 0) {
	error_reporting($CONFIG->error_reporting);
	ini_set('display_errors', 1);
}

define('JDEBUG', $CONFIG->debug);

unset($CONFIG);

/*
 * Cholapps framework loading.
 */

// System profiler.
if (JDEBUG) {
	jimport('chola.error.profiler');
	$_PROFILER = JProfiler::getInstance('Application');
}

// Cholapps library imports.
jimport('chola.application.menu');
jimport('chola.user.user');
jimport('chola.environment.uri');
jimport('chola.html.html');
jimport('chola.html.parameter');
jimport('chola.utilities.utility');
jimport('chola.event.event');
jimport('chola.event.dispatcher');
jimport('chola.language.language');
jimport('chola.utilities.string');
