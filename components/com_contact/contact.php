<?php
/**
 * @version		$Id: contact.php 21097 2011-04-07 15:38:03Z dextercowley $
 * @package		Chola.Site
 * @subpackage	com_contact
 * @copyright	Copyright (C) 2005 - 2011 Cholalabs Software LLP. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

jimport('chola.application.component.controller');
require_once JPATH_COMPONENT.'/helpers/route.php';

$controller = JController::getInstance('Contact');
$controller->execute(JRequest::getCmd('task'));
$controller->redirect();
