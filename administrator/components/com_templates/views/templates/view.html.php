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
 * View class for a list of template styles.
 *
 * @package		Chola.Administrator
 * @subpackage	com_templates
 * @since		1.6
 */
class TemplatesViewTemplates extends JView
{
	/**
	 * @var		array
	 * @since	1.6
	 */
	protected $items;

	/**
	 * @var		object
	 * @since	1.6
	 */
	protected $pagination;

	/**
	 * @var		object
	 * @since	1.6
	 */
	protected $state;

	/**
	 * Display the view.
	 *
	 * @param	string
	 *
	 * @return	void
	 * @since	1.6
	 */
	public function display($tpl = null)
	{
		$this->items		= $this->get('Items');
		$this->pagination	= $this->get('Pagination');
		$this->state		= $this->get('State');
		$this->preview		= JComponentHelper::getParams('com_templates')->get('template_positions_display');

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
	 * @return	void
	 * @since	1.6
	 */
	protected function addToolbar()
	{
		$state	= $this->get('State');
		$canDo	= TemplatesHelper::getActions();

		JToolBarHelper::title(JText::_('COM_TEMPLATES_MANAGER_TEMPLATES'), 'thememanager');
		if ($canDo->get('core.admin')) {
			JToolBarHelper::preferences('com_templates');
			JToolBarHelper::divider();	
		}
		JToolBarHelper::help('JHELP_EXTENSIONS_TEMPLATE_MANAGER_TEMPLATES');
	}
}
