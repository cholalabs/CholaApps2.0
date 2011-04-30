<?php
/**
 * @version		$Id: template.php 20196 2011-01-09 02:40:25Z ian $
 * @copyright	Copyright (C) 2005 - 2011 Cholalabs Software LLP. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

jimport('chola.application.component.controller');

/**
 * Template style controller class.
 *
 * @package		Chola.Administrator
 * @subpackage	com_templates
 * @since		1.6
 */
class TemplatesControllerTemplate extends JController
{
	/**
	 */
	public function cancel()
	{
		$this->setRedirect('index.php?option=com_templates&view=templates');
	}
}