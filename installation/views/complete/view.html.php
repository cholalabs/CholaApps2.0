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
 * The HTML Chola Core Install Complete View
 *
 * @package		Chola.Installation
 * @since		1.6
 */
class JInstallationViewComplete extends JView
{
	/**
	 * Display the view
	 *
	 * @access	public
	 */
	function display($tpl = null)
	{
		$state = $this->get('State');
		$options = $this->get('Options');

		// Get the config string from the session.
		$session = JFactory::getSession();
		$config = $session->get('setup.config', null);

		// Check for errors.
		if (count($errors = $this->get('Errors'))) {
			JError::raiseError(500, implode("\n", $errors));
			return false;
		}

		$this->assignRef('state', $state);
		$this->assignRef('options', $options);
		$this->assignRef('config', $config);

		parent::display($tpl);
	}
}