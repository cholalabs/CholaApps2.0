<?php
/**
 * @version		$Id: users.php 20196 2011-01-09 02:40:25Z ian $
 * @package		Chola.Site
 * @subpackage	com_users
 * @copyright	Copyright (C) 2005 - 2011 Cholalabs Software LLP. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * @since		1.5
 */

defined('_JEXEC') or die;

jimport('chola.application.component.controller');
require_once JPATH_COMPONENT.'/helpers/route.php';

// Launch the controller.
$controller = JController::getInstance('Users');
$controller->execute(JRequest::getCmd('task', 'display'));
$controller->redirect();