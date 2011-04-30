<?php
/**
 * @version		$Id: import.php 20806 2011-02-21 19:44:59Z dextercowley $
 * @package		Chola.Framework
 * @copyright	Copyright (C) 2005 - 2011 Cholalabs Software LLP. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

// Load the loader class.
if (!class_exists('JLoader')) {
	require_once JPATH_LIBRARIES.'/loader.php';
}

//
// Cholapps library imports.
//

// Base classes.
JLoader::import('chola.base.object');

// Environment classes.
JLoader::import('chola.environment.request');

// If an application flags it doesn't want this, adhere to that.
if (!defined('_JREQUEST_NO_CLEAN')) {
	JRequest::clean();
}

JLoader::import('chola.environment.response');

// Factory class and methods.
JLoader::import('chola.factory');
JLoader::import('chola.version');

if (!defined('JVERSION')) {
	$version = new JVersion();
	define('JVERSION', $version->getShortVersion());
}

// Error.
JLoader::import('chola.error.error');
JLoader::import('chola.error.exception');

// Utilities.
JLoader::import('chola.utilities.arrayhelper');

// Filters.
JLoader::import('chola.filter.filterinput');
JLoader::import('chola.filter.filteroutput');

// Register class that don't follow one file per class naming conventions.
JLoader::register('JText', dirname(__FILE__).DS.'methods.php');
JLoader::register('JRoute', dirname(__FILE__).DS.'methods.php');
