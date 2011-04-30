<?php
/**
 * @version		$Id: view.html.php 20196 2011-01-09 02:40:25Z ian $
 * @package		Chola.Installation
 * @copyright	Copyright (C) 2005 - 2011 Cholalabs Software LLP. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

jimport('chola.application.component.view');
jimport('chola.html.html');

/**
 * The HTML Chola Core Site Configuration View
 *
 * @package		Chola.Installation
 * @since		1.6
 */
class JInstallationViewSite extends JView
{
	/**
	 * Display the view
	 *
	 * @access	public
	 */
	function display($tpl = null)
	{
		$state = $this->get('State');
		$form  = $this->get('Form');
		$sample_installed = $form->getValue('sample_installed', null, 0);

		// Check for errors.
		if (count($errors = $this->get('Errors'))) {
			JError::raiseError(500, implode("\n", $errors));
			return false;
		}

		$this->assignRef('state', $state);
		$this->assignRef('form', $form);
		$this->assign('sample_installed', $sample_installed);

		parent::display($tpl);
	}
}