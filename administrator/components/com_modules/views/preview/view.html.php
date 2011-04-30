<?php
/**
 * @version		$Id: view.html.php 21097 2011-04-07 15:38:03Z dextercowley $
 * @package		Chola.Administrator
 * @subpackage	com_modules
 * @copyright	Copyright (C) 2005 - 2011 Cholalabs Software LLP. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// Check to ensure this file is included in Cholapps
defined('_JEXEC') or die;

jimport('chola.application.component.view');

/**
 * HTML View class for the Modules component
 *
 * @static
 * @package		Chola.Administrator
 * @subpackage	com_modules
 * @since 1.6
 */
class ModulesViewPreview extends JView
{
	function display($tpl = null)
	{
		$editor = JFactory::getEditor();

		$this->assignRef('editor',		$editor);

		parent::display($tpl);
	}
}