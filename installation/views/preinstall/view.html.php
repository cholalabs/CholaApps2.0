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
 * The HTML Chola Core Pre-Install View
 *
 * @package		Chola.Installation
 * @since		1.6
 */
class JInstallationViewPreinstall extends JView
{
	/**
	 * Display the view
	 *
	 * @param	string
	 *
	 * @return	void
	 * @since	1.6
	 */
	public function display($tpl = null)
	{
		$this->state		= $this->get('State');
		$this->settings		= $this->get('PhpSettings');
		$this->options		= $this->get('PhpOptions');
		$this->sufficient	= $this->get('PhpOptionsSufficient');
		$this->version		= new JVersion;

		// Check for errors.
		if (count($errors = $this->get('Errors'))) {
			JError::raiseError(500, implode("\n", $errors));
			return false;
		}

		parent::display($tpl);
	}
}