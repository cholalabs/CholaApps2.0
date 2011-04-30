<?php
/**
 * @version		$Id: weblinks.php 20196 2011-01-09 02:40:25Z ian $
 * @package		Chola.Administrator
 * @subpackage	com_weblinks
 * @copyright	Copyright (C) 2005 - 2011 Cholalabs Software LLP. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

// Access check.
if (!JFactory::getUser()->authorise('core.manage', 'com_weblinks')) {
	return JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
}

// Include dependancies
jimport('chola.application.component.controller');

$controller	= JController::getInstance('Weblinks');
$controller->execute(JRequest::getCmd('task'));
$controller->redirect();