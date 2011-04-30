<?php
/**
 * @version		$Id: view.html.php 20196 2011-01-09 02:40:25Z ian $
 * @copyright	Copyright (C) 2005 - 2011 Cholalabs Software LLP. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access.
defined('_JEXEC') or die;

jimport('chola.application.component.view');

/**
 * View class for a list of user groups.
 *
 * @package		Chola.Administrator
 * @subpackage	com_users
 * @since		1.6
 */
class UsersViewGroups extends JView
{
	protected $items;
	protected $pagination;
	protected $state;

	/**
	 * Display the view
	 */
	public function display($tpl = null)
	{
		$this->items		= $this->get('Items');
		$this->pagination	= $this->get('Pagination');
		$this->state		= $this->get('State');

		// Check for errors.
		if (count($errors = $this->get('Errors'))) {
			JError::raiseError(500, implode("\n", $errors));
			return false;
		}

		$this->addToolbar();
		parent::display($tpl);
	}

	/**
	 * Add the page title and toolbar.
	 *
	 * @since	1.6
	 */
	protected function addToolbar()
	{
		$canDo	= UsersHelper::getActions();

		JToolBarHelper::title(JText::_('COM_USERS_VIEW_GROUPS_TITLE'), 'groups');

		if ($canDo->get('core.create')) {
			JToolBarHelper::custom('group.add', 'new.png', 'new_f2.png', 'JTOOLBAR_NEW', false);
		}
		if ($canDo->get('core.edit')) {
			JToolBarHelper::custom('group.edit', 'edit.png', 'edit_f2.png','JTOOLBAR_EDIT', true);
			JToolBarHelper::divider();
		}
		if ($canDo->get('core.delete')) {
			JToolBarHelper::deleteList('', 'groups.delete','JTOOLBAR_DELETE');
			JToolBarHelper::divider();
		}

		if ($canDo->get('core.admin')) {
			JToolBarHelper::preferences('com_users');
			JToolBarHelper::divider();
		}
		JToolBarHelper::help('JHELP_USERS_GROUPS');
	}
}
