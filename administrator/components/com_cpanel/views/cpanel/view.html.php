<?php
/**
 * @version		$Id: view.html.php 21097 2011-04-07 15:38:03Z dextercowley $
 * @package		Chola.Administrator
 * @subpackage	com_cpanel
 * @copyright	Copyright (C) 2005 - 2011 Cholalabs Software LLP. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// Check to ensure this file is included in Cholapps
defined('_JEXEC') or die;

jimport('chola.application.component.view');
jimport('chola.application.module.helper');

/**
 * HTML View class for the Cpanel component
 *
 * @static
 * @package		Chola.Administrator
 * @subpackage	com_cpanel
 * @since 1.0
 */
class CpanelViewCpanel extends JView
{
	protected $modules = null;

	public function display($tpl = null)
	{
		// Set toolbar items for the page
		JToolBarHelper::title(JText::_('COM_CPANEL'), 'cpanel.png');
		JToolBarHelper::help('screen.cpanel');

		/*
		 * Set the template - this will display cpanel.php
		 * from the selected admin template.
		 */
		JRequest::setVar('tmpl', 'cpanel');

		// Display the cpanel modules
		$this->modules = JModuleHelper::getModules('cpanel');

		parent::display($tpl);
	}
}