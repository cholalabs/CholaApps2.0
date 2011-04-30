<?php
/**
 * @version		$Id: wrapper.php 20196 2011-01-09 02:40:25Z ian $
 * @package		Chola.Site
 * @subpackage	com_wrapper
 * @copyright	Copyright (C) 2005 - 2011 Cholalabs Software LLP. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

// Include dependancies
jimport('chola.application.component.controller');

$controller = JController::getInstance('Wrapper');
$controller->execute(JRequest::getCmd('task'));
$controller->redirect();