<?php
/**
 * @version		$Id: view.html.php 20196 2011-01-09 02:40:25Z ian $
 * @copyright	Copyright (C) 2005 - 2011 Cholalabs Software LLP. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

jimport('chola.application.component.view');

/**
 * @package		Chola.Administrator
 * @subpackage	com_admin
 */
class AdminViewProfile extends JView
{
	protected $form;
	protected $item;
	protected $state;

	/**
	 * Display the view
	 */
	public function display($tpl = null)
	{
		$this->form			= $this->get('Form');
		$this->item			= $this->get('Item');
		$this->state		= $this->get('State');

		// Check for errors.
		if (count($errors = $this->get('Errors'))) {
			JError::raiseError(500, implode("\n", $errors));
			return false;
		}

		$this->form->setValue('password',	null);
		$this->form->setValue('password2',	null);

		parent::display($tpl);
		$this->addToolbar();
	}

	/**
	 * Add the page title and toolbar.
	 *
	 * @since	1.6
	 */
	protected function addToolbar()
	{
		JRequest::setVar('hidemainmenu', 1);

		JToolBarHelper::title(JText::_('COM_ADMIN_VIEW_PROFILE_TITLE'), 'user-profile');
		JToolBarHelper::apply('profile.apply','JTOOLBAR_APPLY');
		JToolBarHelper::save('profile.save','JTOOLBAR_SAVE');
		JToolBarHelper::cancel('profile.cancel', 'JTOOLBAR_CLOSE');
		JToolBarHelper::divider();
		JToolBarHelper::help('JHELP_ADMIN_USER_PROFILE_EDIT');
	}
}
