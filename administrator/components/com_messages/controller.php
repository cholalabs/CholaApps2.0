<?php
/**
 * @version		$Id: controller.php 20952 2011-03-11 16:09:38Z infograf768 $
 * @copyright	Copyright (C) 2005 - 2011 Cholalabs Software LLP. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

jimport('chola.application.component.controller');

/**
 * Messages master display controller.
 *
 * @package		Chola.Administrator
 * @subpackage	com_messages
 * @since		1.6
 */
class MessagesController extends JController
{
	/**
	 * Method to display a view.
	 *
	 * @param	boolean			If true, the view output will be cached
	 * @param	array			An array of safe url parameters and their variable types, for valid values see {@link JFilterInput::clean()}.
	 *
	 * @return	JController		This object to support chaining.
	 * @since	1.5
	 */
	public function display($cachable = false, $urlparams = false)
	{
		require_once JPATH_COMPONENT.'/helpers/messages.php';

		$view		= JRequest::getCmd('view', 'messages');
		$layout 	= JRequest::getCmd('layout', 'default');
		$id			= JRequest::getInt('id');

		// Check for edit form.
		if ($view == 'message' && $layout == 'edit' && !$this->checkEditId('com_messages.edit.message', $id)) {
			// Somehow the person just went to the form - we don't allow that.
			$this->setError(JText::sprintf('JLIB_APPLICATION_ERROR_UNHELD_ID', $id));
			$this->setMessage($this->getError(), 'error');
			$this->setRedirect(JRoute::_('index.php?option=com_messages&view=messages', false));

			return false;
		}

		parent::display();

		// Load the submenu.
		MessagesHelper::addSubmenu(JRequest::getCmd('view', 'messages'));
	}
}