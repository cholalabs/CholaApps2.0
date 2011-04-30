<?php
/**
 * @version		$Id: view.html.php 20196 2011-01-09 02:40:25Z ian $
 * @copyright	Copyright (C) 2005 - 2011 Cholalabs Software LLP. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 * @since		1.5
 */

// no direct access
defined('_JEXEC') or die;

include_once dirname(__FILE__).'/../default/view.php';

/**
 * Extension Manager Install View
 *
 * @package		Chola.Administrator
 * @subpackage	com_installer
 * @since		1.5
 */
class InstallerViewInstall extends InstallerViewDefault
{
	/**
	 * @since	1.5
	 */
	function display($tpl=null)
	{
		$paths = new stdClass();
		$paths->first = '';
		$state = $this->get('state');

		$this->assignRef('paths', $paths);
		$this->assignRef('state', $state);

		parent::display($tpl);
	}

	/**
	 * Add the page title and toolbar.
	 *
	 * @since	1.6
	 */
	protected function addToolbar()
	{
		parent::addToolbar();
		JToolBarHelper::help('JHELP_EXTENSIONS_EXTENSION_MANAGER_INSTALL');
	}
}