<?php
/**
 * @version		$Id: banners.php 20196 2011-01-09 02:40:25Z ian $
 * @package		Chola.Site
 * @subpackage	com_banners
 * @copyright	Copyright (C) 2005 - 2011 Cholalabs Software LLP. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Include dependancies
jimport('chola.application.component.controller');

// Execute the task.
$controller	= JController::getInstance('Banners');
$controller->execute(JRequest::getVar('task','click'));
$controller->redirect();
